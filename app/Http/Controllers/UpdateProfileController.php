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


    public function update(Request $request, User $user)
    {

        $id = Auth::id(); 
        $user = User::find($id);
        $request->validate([
            'name' => 'required',
        ]);
    
        $user->update($request->all());
    
        return back()->with("status", "User Update Successfully");
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if(!\Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }
        
        User::whereId(auth()->user()->id)->update([
            'password' => \Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password Changed Successfully");
    }
}