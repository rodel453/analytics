<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemographicsController extends Controller
{
    public function index(){

    }

    public function demographics_overview(){

        return view('frontend.demographics.demographics-overview');
    }

    public function demographics_details(){

        return view('frontend.demographics.demographics-details');
    }

}
