<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthController;

class DemographicsController extends Controller
{
    public function index(){

    }

    public function demographics_overview(){

        $userCity = AuthController::dynamic_http_client('https://api.mystaging.ml/api/UsersCity');

        return view('frontend.demographics.demographics-overview', compact('userCity'));
    }

    public function demographics_details(){

        return view('frontend.demographics.demographics-details');
    }

}
