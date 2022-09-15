<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;
use Datatables;
use App\DataTables\UserDataTable;
use App\DataTables\WebsiteDataTable;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('frontend.dashboard');
    }

    public function website_user(){

        $user_website = User::find(auth()->user()->id)->websites()->get();
        // return Datatables::of(Users::query())->make(true);
        return view('frontend.website', compact('user_website'));

    }

    public function website_store(Request $request){

        Website::create([
            'user_id' => auth()->user()->id,
            'g_view_id' => $request->g_view_id,
            'website_name' => $request->website_name,
            'website_status' => 1,
        ]);
            return redirect('/website');

    }
}
