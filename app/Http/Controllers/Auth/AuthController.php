<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
// use Auth;
use App\Models\User;

class AuthController extends Controller
{
    protected function redirectTo(){
    $utype = Auth::user()->user_type;
    if ($utype == 1 ) {
        $usercount = User::all()->count();
        return view('backend.dashboard',compact('usercount'));
    } else {
        return view('frontend.dashboard');
    }
    }
}
