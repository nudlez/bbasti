<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Session;

class CartController extends Controller
{   

    public function session_id(){
        $sessionID = (Auth::check()) ? Auth::user()->id : Session::getId();
        return $sessionID;
    }

    public function cart_add(Request $request){
        $request->validate([
            'item' => 'required',
        ]);

        $item = Item::select('id', 'name', 'disc_price', 'main_img')
                ->where('id', Crypt::decrypt($request->item))
                ->first();

        \Cart::session($this->session_id())->add([
            'id' => $item->id, 
            'name' => $item->name,
            'price' => $item->disc_price,
            'quantity' => 1,
            'attributes' => array(['image'=>$item->main_img]),
        ]);
        return back()->with('alert', 'Item added to cart');
    }

    public function cart_get(){
        $items = \Cart::session($this->session_id())->getContent();
        return view('cart-page', ['items'=>$items]);
    }
}
