<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcquisitionController extends Controller
{
    
    public function index(){


    }


    public function acquisition_overview(){

        return view('frontend.acquisition.acquisition-overview');
    }

    public function user_acquisition(){

        return view('frontend.acquisition.user-acquisition');
    }

    public function traffic_acquisition(){

        return view('frontend.acquisition.traffic-acquisition');
    }

}
