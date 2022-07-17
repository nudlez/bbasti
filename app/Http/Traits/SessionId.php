<?php
namespace App\Http\Traits;
use Illuminate\Support\Facades\Auth;
use Session;

trait SessionId {
    public function session_id() {
        $sessionID = (Auth::check()) ? Auth::user()->id : Session::getId();
        return $sessionID;
    }
}