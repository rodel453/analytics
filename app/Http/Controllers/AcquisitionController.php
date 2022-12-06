<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthController;

class AcquisitionController extends Controller
{
    
    public function index(){


    }


    public function acquisition_overview(){

        $channelNewUser = AuthController::dynamic_http_client('https://api.mystaging.ml/api/channelGroupingNewUsers', AuthController::get_api_data());
        $channelSession = AuthController::dynamic_http_client('https://api.mystaging.ml/api/channelGroupingSessions', AuthController::get_api_data());

        //Total user
        $user_date = AuthController::dynamic_http_client('https://api.mystaging.ml/api/usersDate', AuthController::get_api_data());
        $user_date_row = $user_date['rows'];
        $total_user = array_sum(array_column($user_date_row, '1'));

        //Total new user
        $new_user_date = AuthController::dynamic_http_client('https://api.mystaging.ml/api/newUsersDate', AuthController::get_api_data());
        $new_user_date_row = $new_user_date['rows'];
        $total_newuser = array_sum(array_column($new_user_date_row, '1'));


        return view('frontend.acquisition.acquisition-overview', compact('channelNewUser', 'channelSession', 'total_user', 'total_newuser' ));
    }

    public function user_acquisition(){

        return view('frontend.acquisition.user-acquisition');
    }

    public function traffic_acquisition(){

        return view('frontend.acquisition.traffic-acquisition');
    }

}
