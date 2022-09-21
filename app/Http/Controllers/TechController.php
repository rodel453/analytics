<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TechController extends Controller
{
    public function index(){

    }

    public function tech_overview(){

        return view('frontend.tech.tech-overview');
    }

    public function tech_details(){

        return view('frontend.tech.tech-details');
    }
}
