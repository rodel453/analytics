<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthController;

class TechController extends Controller
{
    public function index(){

    }

    public function tech_overview(){

        $userOS = AuthController::dynamic_http_client('https://api.mystaging.ml/api/UsersOperatingSystem');
        $userPlatform = AuthController::dynamic_http_client('https://api.mystaging.ml/api/UsersPlatform');

        $device_category = AuthController::dynamic_http_client('https://api.mystaging.ml/api/UsersDeviceCategory');
        $device_category_json = $device_category['rows'];
        $fix_top_device = [];
        $max_value_device = array_sum(array_column($device_category_json, '1'));

        foreach ($device_category_json as $key => $value) {
            
            $tempo_percentage = $value['1'] / $max_value_device * 100;

            $fix_top_device[$key] = $value;
            $fix_top_device[$key]['percentage'] = round($tempo_percentage, 2);
        }
        $device_category_json = $fix_top_device;

        return view('frontend.tech.tech-overview', compact('userOS', 'userPlatform', 'device_category_json'));
    }

    public function tech_details(){

        return view('frontend.tech.tech-details');
    }

    public function users_browser(){

        $json_response =  AuthController::dynamic_http_client('https://api.mystaging.ml/api/UsersBrowser');

        return response()->json($json_response['rows']);

    }

    public function users_resolution(){

        $json_response =  AuthController::dynamic_http_client('https://api.mystaging.ml/api/UsersScreenResolution');

        return response()->json($json_response['rows']);

    }
}
