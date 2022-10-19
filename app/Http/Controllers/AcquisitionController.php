<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthController;

class AcquisitionController extends Controller
{
    
    public function index(){


    }


    public function acquisition_overview(){

        $channelNewUser = AuthController::dynamic_http_client('https://api.mystaging.ml/api/channelGroupingNewUsers');
        $channelSession = AuthController::dynamic_http_client('https://api.mystaging.ml/api/channelGroupingSessions');

        return view('frontend.acquisition.acquisition-overview', compact('channelNewUser', 'channelSession'));
    }

    public function user_acquisition(){

        return view('frontend.acquisition.user-acquisition');
    }

    public function traffic_acquisition(){

        return view('frontend.acquisition.traffic-acquisition');
    }

}
