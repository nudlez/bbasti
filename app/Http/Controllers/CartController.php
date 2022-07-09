<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Crypt;

class CartController extends Controller
{
    public function cart_add($id){
        $item = Item::findOrFail(Crypt::decrypt($id));
        \Cart::add([
            'id' => $item->id, 
            'name' => $item->name,
            'price' => $item->price,
            'quantity' => 1,
            'attributes' => array(['image'=>$item->main_img]),
        ]);
        return back()->with('alert', 'Item added to cart');
    }

    public function cart_get(){
        return dd(\Cart::getContent());
    }
}
