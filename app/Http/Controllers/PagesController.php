<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Http\Traits\SessionId;
use Session;

class PagesController extends Controller
{
    use SessionId;

    public function index(){
        $items = Item::select('id', 'price', 'disc_price', 'main_img')->get();
        return view('index', ['items'=>$items]);
    }

    public function itemPage($id){
        $item = Item::find($id);
        
        $cart_items = \Cart::session($this->session_id())->getContent();
        $exists = (Arr::exists($cart_items, $item->id) ? true : false);

        return view('item-page', ['item'=>$item, 'exists'=>$exists]);
    }
}