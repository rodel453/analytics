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
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Http;

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
        $response = Http::withHeaders([
            'Authorization' => 'Bearer 1|aAroKE1BBxHrCXIpv1lTYDG7xce3dmFC73j4cFws',
            'accept' => 'application/json',
        ])->attach(
            'test', file_get_contents($request->file('website_file')), $fileName
        )->post('https://api.mystaging.ml/api/website-contents');

        // $request->website_file->move(public_path($path), $fileName);
        $api_path = 'app/google/';
      

       $website = Website::create([
            'user_id' => auth()->user()->id,
            'g_view_id' => $request->g_view_id,
            'website_name' => $request->website_name,
            'website_file' => $api_path . $fileName,
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
        $oldFile = Website::find($id)->getAttributes()['website_file'];
        File::delete(public_path($oldFile));
        Website::find($id)->delete();

        return response()->json(['success'=>'Website deleted successfully.']);
    }

    public function fetch_website_data($id){

        
        $website_data = Website::find($id);
        $view_page = AuthController::dynamic_http_client('https://api.mystaging.ml/api/viewpage', AuthController::get_api_data());
        $session_duration = AuthController::dynamic_http_client('https://api.mystaging.ml/api/TimeOnSite', AuthController::get_api_data());

        $avg_session_duration = $session_duration['rows'][0][1] / $session_duration['rows'][0][0];
        $avg_session_duration_round = round($avg_session_duration, 2);

        $avg_page_load_time =  AuthController::dynamic_http_client('https://api.mystaging.ml/api/PageLoadTime', AuthController::get_api_data());
        $user_types = AuthController::dynamic_http_client('https://api.mystaging.ml/api/fetchUserTypes', AuthController::get_api_data());
        
        //Total user
        $user_date = AuthController::dynamic_http_client('https://api.mystaging.ml/api/usersDate', AuthController::get_api_data());
        $user_date_row = $user_date['rows'];
        $total_user = array_sum(array_column($user_date_row, '1'));

        //Total new user
        $new_user_date = AuthController::dynamic_http_client('https://api.mystaging.ml/api/newUsersDate', AuthController::get_api_data());
        $new_user_date_row = $new_user_date['rows'];
        $total_newuser = array_sum(array_column($new_user_date_row, '1'));

        //Top Country
        $top_countries = AuthController::dynamic_http_client('https://api.mystaging.ml/api/UsersCountry', AuthController::get_api_data());
        $top_country = $top_countries['rows'];

        $website_data['view_page'] = $view_page;
        $website_data['avg_page_load_time'] = $avg_page_load_time;
        $website_data['avg_session_duration_round'] = $avg_session_duration_round;
        $website_data['user_types'] = $user_types;
        $website_data['total_user'] = $total_user;
        $website_data['total_newuser'] = $total_newuser;
        $website_data['top_country'] = $top_country;
        // dd($website_data);
        return response()->json($website_data);

    }

    public function fetch_userDate(Request $request){
        $slug = $request->fetch_type == 'user' ? 'usersDate' : 'newUsersDate';
        $website_header['g_view_id'] = '275147276';
        $website_header['website_file'] = 'app/google/20221012634682137274d.json';

        $users_date = AuthController::dynamic_http_client('https://api.mystaging.ml/api/'. $slug, $website_header);
        $users_date = $users_date['rows'];

        $user_data = [];

        foreach ($users_date as $key => $value) {
            
            $tmp_str = str_split($value[0], 4);
            $user_data[$key]['year'] = $tmp_str[0];
            $user_data[$key]['month'] = $tmp_str[1];
            $user_data[$key]['user_count'] = $value[1];
            
        }
        return response()->json($user_data);
    }
    
}
