<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        return view('admin.layout');
    }

    public function items(){
        $items = Item::select('name', 'id')->get();
        return view('admin.item-page', ['items'=>$items]);
    }

    public function itemPage($id){
        $item = Item::findOrFail($id);
        return view('admin.item-single', ['item'=>$item]);
    }

    public function itemEdit(Request $request, $id){
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'disc_price' => 'required|numeric',
            'description' => 'required|string',
            'status' => 'required|string',
        ]);

        $item = Item::find($id);

        $item->name = $request->name;
        $item->price = $request->price;
        $item->disc_price = $request->disc_price;
        $item->description = $request->description;
        $item->status = $request->status;

        if($item->save()){
            $message = "Changes to item has been saved";
        }else{
            $message = "Someting went wrong..... RUN!";
        }

        return redirect()->back()->with('alert', $message);
    }

    public function changeImage(Request $request, $id){
        $request->validate([
            'main_img' => 'required|mimes:jpg,png,bmp,webp|max:2040',
        ]);
        $item = Item::findOrFail($id);
        $name = $request->main_img->getClientOriginalName();
        $request->file('main_img')->storeAs('public/images', $name);
        $item->main_img = $name;
        $item->save();

        return back()->with('alert', 'Success!');

    }

    public function itemAdd(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'name' => 'required|string',
                'price' => 'required|numeric',
                'disc_price' => 'required|numeric',
                'description' => 'required|string',
                'status' => 'required|string',
                'main_img' => 'required|mimes:jpg,png,bmp,webp',
            ]);

            $item = new Item;
            $item->name = $request->name;
            $item->price = $request->price;
            $item->disc_price = $request->disc_price;
            $item->description = $request->description;
            $item->status = $request->status;
            $item->imgs = "none";
            $item->main_img = $request->main_img->getClientOriginalName();

            $request->file('main_img')->storeAs('public/images', $request->main_img->getClientOriginalName());

            if ($item->save()) {
                return back()->with('alert', 'Item added!');
            } else {
                return back()->with('alert', 'Something went wrong... RUN!');
            }
            
        }else{
            return view('admin.item-add');
        }
    }

    public function itemDelete($id){
        Item::findOrFail($id)->delete();
        return redirect()->route('admin.items')->with('alert', 'Item has been deleted');
    }

    public function getUsers(){
        $users = User::select('id', 'name')->get();
        return view('admin.user', ['users'=>$users]);
    }

    public function userSingle($id){
        $user = User::findOrFail($id);
        return view('admin.user-single', ['user'=>$user]);
    }
}
