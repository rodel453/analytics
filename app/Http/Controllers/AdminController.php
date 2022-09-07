<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;
use Datatables;
use App\DataTables\UserDataTable;
use App\DataTables\WebsiteDataTable;
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

    public function website_data(WebsiteDataTable $datatable){

        // return Datatables::of(Users::query())->make(true);
        return $datatable->render('backend.website');

    }

    public function user_view(){

        // return view('backend.users');
    }

    public function update(Request $request)
    {
        $user_data = User::find($request->user_id);
        $user_data->first_name = $request->first_name;
        $user_data->save();  
     
        return response()->json(['success'=>'User saved successfully.']);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }



    public function delete($id)
    {
        User::find($id)->delete();
     
        return response()->json(['success'=>'User deleted successfully.']);
    }

    public function status_update($id, $status)
    {
        $website = Website::find($id);
        $website->website_status = $status;
        $website->save();
        return response()->json('success');
    }

}
