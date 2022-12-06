<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
// use Auth;
use App\Models\User;
use App\Models\Website;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AuthController extends Controller
{


    
    protected function redirectTo(){
    $utype = Auth::user()->user_type;
    if ($utype == 1 ) {
        $websitecount = Website::all()->count();
        $usercount = User::all()->count();
        $newUser = User::where('created_at', '>=', Carbon::now()->subDay())->count();
        return view('backend.dashboard',compact('usercount', 'websitecount', 'newUser'));
    } else {


        $view_page = $this->dynamic_http_client('https://api.mystaging.ml/api/viewpage', $this->get_api_data());

        if(!isset($view_page['exception'])){
            
            $latest_page_views = $view_page[count($view_page) - 1];
        
            $session_duration = $this->dynamic_http_client('https://api.mystaging.ml/api/TimeOnSite', $this->get_api_data());

            $avg_session_duration = $session_duration['rows'][0][1] / $session_duration['rows'][0][0];
            $avg_session_duration_round = round($avg_session_duration, 2);

            $avg_page_load_time = $this->dynamic_http_client('https://api.mystaging.ml/api/PageLoadTime', $this->get_api_data());

            $top_browsers = $this->dynamic_http_client('https://api.mystaging.ml/api/fetchTopBrowsers', $this->get_api_data());
            $fix_top_browsers = [];
            $max_value_browsers = array_sum(array_column($top_browsers, 'sessions'));
            foreach ($top_browsers as $key => $value) {
                
                $temp_percentage = $value['sessions'] / $max_value_browsers * 100;

                $fix_top_browsers[$key] = $value;
                $fix_top_browsers[$key]['percentage'] = round($temp_percentage, 2);

            }
            $top_browsers = $fix_top_browsers;


            $device_category = $this->dynamic_http_client('https://api.mystaging.ml/api/UsersDeviceCategory', $this->get_api_data());
            $device_category_json = $device_category['rows'];
            $fix_top_device = [];
            $max_value_device = array_sum(array_column($device_category_json, '1'));
    
            foreach ($device_category_json as $key => $value) {
                
                $tempo_percentage = $value['1'] / $max_value_device * 100;
    
                $fix_top_device[$key] = $value;
                $fix_top_device[$key]['percentage'] = round($tempo_percentage, 2);
            }
            $device_category_json = $fix_top_device;

            //Total user
            $user_date = $this->dynamic_http_client('https://api.mystaging.ml/api/usersDate', $this->get_api_data());
            $user_date_row = $user_date['rows'];
            $total_user = array_sum(array_column($user_date_row, '1'));

            //Total new user
            $new_user_date = $this->dynamic_http_client('https://api.mystaging.ml/api/newUsersDate', $this->get_api_data());
            $new_user_date_row = $new_user_date['rows'];
            $total_newuser = array_sum(array_column($new_user_date_row, '1'));

            $top_countries = $this->dynamic_http_client('https://api.mystaging.ml/api/UsersCountry', $this->get_api_data());
            $top_country = $top_countries['rows'];
            
            $user_website = $this->dynamic_http_client('https://api.mystaging.ml/api/website-list', $this->get_api_data());
            $website_data = $this->load_website_data();
            
            return view('frontend.dashboard', compact('user_website', 'website_data', 'latest_page_views', 'top_browsers', 'top_country', 'avg_session_duration_round', 'avg_page_load_time', 'device_category_json', 'total_newuser', 'total_user'));

        }
        
        $user_website = Website::where('user_id', auth()->user()->id)->get();
        $message = 'Wrong Google Analytics Credentials';
        return view('frontend.dashboard', compact('message', 'user_website'));
        
    }
    
    }
    public function load_website_data(){

        $website_data = Website::where('user_id', auth()->user()->id)->first();
        return $website_data;

    }

    public static function dynamic_http_client($url, $data = []){
        $headers = [
            'Authorization' => 'Bearer 1|aAroKE1BBxHrCXIpv1lTYDG7xce3dmFC73j4cFws',
            'accept' => 'application/json'
        ];

        if(!empty($data)){

            $headers['g_view_id'] = $data['g_view_id'];
            $headers['website_file'] = $data['website_file'];

        }

        $response = Http::withHeaders($headers)->get($url);

        return $response->json();

    }

    public function top_referrers(){

        $json_response = $this->dynamic_http_client('https://api.mystaging.ml/api/fetchTopReferrers', $this->get_api_data());

        return response()->json($json_response);
    }

    public function types_of_user(){

        $json_response = $this->dynamic_http_client('https://api.mystaging.ml/api/fetchUserTypes', $this->get_api_data());

        return response()->json($json_response);

    }

    public function top_browsers(){

        $json_response = $this->dynamic_http_client('https://api.mystaging.ml/api/fetchTopBrowsers', $this->get_api_data());

        return response()->json($json_response);
    }

    public function device_category(){

        $json_response = $this->dynamic_http_client('https://api.mystaging.ml/api/UsersDeviceCategory', $this->get_api_data());

        return response()->json($json_response['rows']);

    }

    public static function get_api_data(){

        $fetch_website = Website::where('user_id', auth()->user()->id)->first();
        
        $api_data['g_view_id'] = $fetch_website['g_view_id'];
        $api_data['website_file'] = $fetch_website['website_file'];

        return $api_data;

    }

}
