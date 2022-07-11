<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Crypt;
use Session;

class CartController extends Controller
{   

    public function cart_add(Request $request){
        $request->validate([
            'item' => 'required',
        ]);

        $item = Item::findOrFail(Crypt::decrypt($request->item));
        \Cart::session(Session::getId())->add([
            'id' => $item->id, 
            'name' => $item->name,
            'price' => $item->price,
            'quantity' => 1,
            'attributes' => array(['image'=>$item->main_img]),
        ]);
        return back()->with('alert', 'Item added to cart');
    }

    public function cart_get(){
        $cart = \Cart::session(Session::getId())->getContent();
        return dd($cart);
    }
}
