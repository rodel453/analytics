<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
class UpdateProfileController extends Controller
{

    public function index()
    {
        $id = Auth::id(); 
        $user = User::find($id);
        // echo $user;
        return view('profile.profile',compact('user'));
    }


    public function update()
    {
        
    }
}
