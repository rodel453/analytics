<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){


    }

    public function reports_snapshot(){

        return view('frontend.reports-snapshot');
    }

    public function realtime(){

        return view('frontend.realtime');
    }
}
