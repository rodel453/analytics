<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonetizationController extends Controller
{
    public function index(){

    }

    public function monetization_overview(){

        return view('frontend.monetization.monetization-overview');
    }

    public function ecommerce_purchases(){

        return view('frontend.monetization.ecommerce-purchases');
    }

    public function inapp_purchases(){

        return view('frontend.monetization.inapp-purchases');
    }

    public function publisher_ads(){

        return view('frontend.monetization.publisher-ads');
    }




}
