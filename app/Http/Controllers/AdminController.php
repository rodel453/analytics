<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Datatables;
use App\DataTables\UserDataTable;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // $usercount = User::all()->count();
        // return view('backend.dashboard',compact('usercount'));
    }

    public function user_data(UserDataTable $datatable){

        // return Datatables::of(Users::query())->make(true);
        return $datatable->render('backend.users');

    }

    public function user_view(){

        // return view('backend.users');
    }
}
