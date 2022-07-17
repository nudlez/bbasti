<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $creds = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
    
            if (Auth::attempt($creds)) {
                $request->session()->regenerate();

                $existing = Cart::where('user_id', Auth::user()->id)->get();
                if(count($existing) > 0){
                    foreach($existing as $exist){
                        $item = Item::find($exist->item_id);
                        \Cart::session(Auth::user()->id)->add([
                            'id' => $item->id, 
                            'name' => $item->name,
                            'price' => $item->disc_price,
                            'quantity' => 1,
                            'attributes' => array(['image'=>$item->thumb]),
                        ]);
                    }
                }
    
                return redirect()->route('home');
            }

            return back()->with('alert', 'Wrong creds, motherfucker!');
        }else{
            return view('login');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}