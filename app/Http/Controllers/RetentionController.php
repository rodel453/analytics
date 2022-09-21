<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RetentionController extends Controller
{
    public function index(){

        return view('frontend.retention');
    }
}
