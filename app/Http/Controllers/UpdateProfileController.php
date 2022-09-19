<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UpdateUserProfileNotification;
use App\Notifications\UpdateUserPasswordNotification;
use App\Notifications\UpdateUserPictureNotification;
use Illuminate\Support\Facades\Hash;


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
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
    
        $user->update($request->all());

        $admins = User::where('user_type', 1)->get();

        foreach ($admins as $key => $value) {

            $value->notify(new UpdateUserProfileNotification($user));
        }
    
        return back()->with("status", "User Update Successfully");
    }

    public function updatePassword(Request $request)
    {
        $id = Auth::id(); 
        $user = User::find($id);

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }
        
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $admins = User::where('user_type', 1)->get();

        foreach ($admins as $key => $value) {

            $value->notify(new UpdateUserPasswordNotification($user));
        }

        return back()->with("status", "Password Changed Successfully");
    }

    function updatePicture(Request $request){

        $id = Auth::id(); 
        $user = User::find($id);
        
        $path = 'startbootstrap/css/images/';
        $file = $request->file('admin_image');
        $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';

        //Upload new image
        $upload = $file->move(public_path($path), $new_name);
        
        if( !$upload ){
            return response()->json(['status'=>0,'msg'=>'Something went wrong, upload new picture failed.']);
        }else{
            //Get Old picture
            $oldPicture = User::find(Auth::user()->id)->getAttributes()['picture'];

            if( $oldPicture != '' ){
                if( \File::exists(public_path($path.$oldPicture))){
                    \File::delete(public_path($path.$oldPicture));
                }
            }

            //Update DB
            $update = User::find(Auth::user()->id)->update(['picture'=>$new_name]);

            if( !$upload ){
                return response()->json(['status'=>0,'msg'=>'Something went wrong, updating picture in db failed.']);
            }else{

                $admins = User::where('user_type', 1)->get();

                foreach ($admins as $key => $value) {
        
                    $value->notify(new UpdateUserPictureNotification($user));
                }
                
                return response()->json(['status'=>1,'msg'=>'Your profile picture has been updated successfully']);
            }
        }
    }
}