<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EngagementController extends Controller
{
    public function index(){

    }

    public function engagement_overview(){

        return view('frontend.engagement.engagement-overview');
    }

    public function events(){

        return view('frontend.engagement.events');
    }

    public function conversions(){

        return view('frontend.engagement.conversions');
    }

    public function pages_screens(){

        return view('frontend.engagement.pages-screens');
    }

}
