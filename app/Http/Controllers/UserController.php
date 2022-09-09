<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('frontend.dashboard');
    }

    public function website_user(){

        // return Datatables::of(Users::query())->make(true);
        return view('frontend.website');

    }
}
