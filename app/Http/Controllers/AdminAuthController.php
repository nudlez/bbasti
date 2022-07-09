<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        if ($request->isMethod('post')) {
            $creds = $request->validate([
                'email' => ['required'],
                'password' => ['required'],
            ]);
            if(is_numeric($request->email)){
                if(Auth::guard('admin')->attempt(['number'=>substr($request->email, 1), 'password'=>$request->password])){
                    $request->session()->regenerate();
                    return redirect()->route('admin.home');
                }
            }else{
                if(Auth::guard('admin')->attempt($creds)){
                    $request->session()->regenerate();
                    return redirect()->route('admin.home');
                }
            }

            return back()->with('alert', 'Credentials does not match our records.');
        }else{
            return view('admin.login');
        }
    }

    public function logout(Request $request){
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
