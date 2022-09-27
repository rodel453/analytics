<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
// use Auth;
use App\Models\User;
use App\Models\Website;
use Illuminate\Support\Carbon;

class AuthController extends Controller
{
    protected function redirectTo(){
    $utype = Auth::user()->user_type;
    if ($utype == 1 ) {
        $websitecount = Website::all()->count();
        $usercount = User::all()->count();
        $newUser = User::where('created_at', '>=', Carbon::now()->subDay())->count();
        return view('backend.dashboard',compact('usercount', 'websitecount', 'newUser'));
    } else {
        $user_website = User::find(auth()->user()->id)->websites()->get();
        $website_data = $this->load_website_data();
        return view('frontend.dashboard', compact('user_website', 'website_data'));
    }
    }

    public function load_website_data(){

        $website_data = Website::where('user_id', auth()->user()->id)->first();
        return $website_data;

    }
}
