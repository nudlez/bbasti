<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Cart;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Http\Traits\SessionId;
use Session;

class CartController extends Controller
{   

    use SessionId;

    public function cart_add( Request $request ){
        $request->validate([
            'item' => 'required',
        ]);

        $item = Item::select( 'id', 'name', 'disc_price', 'thumb' )
                ->where( 'id', Crypt::decrypt( $request->item ) )
                ->first();

        $exists = \Cart::session($this->session_id())->getContent();

        if(Arr::exists($exists, $item->id)){
            return back()->with('alert', 'Item already added to cart');
        }

        if(Auth::check()){
            $existing = Cart::select('item_id')->where('user_id', Auth::user()->id)->get();
            if(!Arr::exists($existing, $item->id)){
                Cart::create([
                    'user_id' => Auth::user()->id,
                    'item_id' => $item->id,
                ]);
            }
        }

        \Cart::session($this->session_id())->add([
            'id' => $item->id, 
            'name' => $item->name,
            'price' => $item->disc_price,
            'quantity' => 1,
            'attributes' => array(['image'=>$item->thumb]),
        ]);
        return back()->with('cart-alert', 'Item added to cart');
    }

    public function cart_get(){
        $items = \Cart::session( $this->session_id() )->getContent();
        $total = \Cart::session( $this->session_id() )->getTotal();
        return view( 'cart-page', [ 'items'=>$items, 'total'=>$total ] );
    }
}
