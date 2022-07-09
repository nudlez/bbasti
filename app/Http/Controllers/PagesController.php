<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class PagesController extends Controller
{
    public function index(){
        $items = Item::select('id', 'price', 'disc_price', 'main_img')->get();
        return view('index', ['items'=>$items]);
    }

    public function itemPage($id){
        $item = Item::find($id);
        return view('item-page', ['item'=>$item]);
    }
}