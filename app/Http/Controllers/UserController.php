<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;
use Datatables;
use App\DataTables\UserDataTable;
use App\DataTables\WebsiteDataTable;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewWebsiteNotification;
use Illuminate\Support\Facades\File;

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

        $path = 'startbootstrap/website_file/';
        $fileName = date('Ymd').uniqid().'.'.$request->website_file->getClientOriginalExtension();
        $request->website_file->move(public_path($path), $fileName);
      

       $website = Website::create([
            'user_id' => auth()->user()->id,
            'g_view_id' => $request->g_view_id,
            'website_name' => $request->website_name,
            'website_file' => $path . $fileName,
            'website_status' => 1,
        ]);



            $admins = User::where('user_type', 1)->get();

            foreach ($admins as $key => $value) {

                $value->notify(new NewWebsiteNotification($website));
            } 

            return back()->with("status", "Website Added Sucessfully");

    }

    public function get_websiteData($id)
    {
        $website = Website::find($id);
        return response()->json($website);
    }

    public function website_update(Request $request)
    {
        $path = 'startbootstrap/website_file/';
        $fileName = date('Ymd').uniqid().'.'.$request->website_file_edit->getClientOriginalExtension();
        $request->website_file_edit->move(public_path($path), $fileName);

        $oldFile = Website::find($request->website_id)->getAttributes()['website_file'];

        if( $oldFile != '' ){
            if( File::exists(public_path($oldFile))){
                File::delete(public_path($oldFile));
            }
        }

        $website_data = Website::find($request->website_id);
        $website_data->website_name = $request->website_name_edit;
        $website_data->g_view_id = $request->g_id;
        $website_data->website_file = $path . $fileName;
        $website_data->save();  


     
        return response()->json(['success'=>'Website saved successfully.']);
    }

    public function website_delete($id)
    {
        Website::find($id)->delete();

        return response()->json(['success'=>'Website deleted successfully.']);
    }

    public function fetch_website_data($id){

        $website_data = Website::find($id);

        return response()->json($website_data);

    }
}
