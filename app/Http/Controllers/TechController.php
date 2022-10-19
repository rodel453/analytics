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

        return view('frontend.tech.tech-overview', compact('userOS', 'userPlatform'));
    }

    public function tech_details(){

        return view('frontend.tech.tech-details');
    }
}
