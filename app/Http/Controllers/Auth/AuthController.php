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

        $view_page = $this->dynamic_http_client('https://api.mystaging.ml/api/viewpage');
        $latest_page_views = $view_page[count($view_page) - 1];
        
        $session_duration = $this->dynamic_http_client('https://api.mystaging.ml/api/TimeOnSite');
        $avg_session_duration = $session_duration['rows'][0][1] / $session_duration['rows'][0][0];
        $avg_session_duration_round = round($avg_session_duration, 2);
        
        $avg_page_load_time = $this->dynamic_http_client('https://api.mystaging.ml/api/PageLoadTime');

        $top_browsers = $this->dynamic_http_client('https://api.mystaging.ml/api/fetchTopBrowsers');
        $fix_top_browsers = [];
        $max_value_browsers = array_sum(array_column($top_browsers, 'sessions'));
        foreach ($top_browsers as $key => $value) {
            
            $temp_percentage = $value['sessions'] / $max_value_browsers * 100;

            $fix_top_browsers[$key] = $value;
            $fix_top_browsers[$key]['percentage'] = round($temp_percentage, 2);

        }
        $top_browsers = $fix_top_browsers;

        $top_country = $this->dynamic_http_client('https://api.mystaging.ml/api/country');
        
        $user_website = $this->dynamic_http_client('https://api.mystaging.ml/api/website-list');
        $website_data = $this->load_website_data();
        return view('frontend.dashboard', compact('user_website', 'website_data', 'latest_page_views', 'top_browsers', 'top_country', 'avg_session_duration_round', 'avg_page_load_time'));
    }
    
    }
    public function load_website_data(){

        $website_data = Website::where('user_id', auth()->user()->id)->first();
        return $website_data;

    }

    public static function dynamic_http_client($url){

        // Call for other Controller
        // App/Http/Controllers/Auth/AuthController
        // $reponse = AuthController::dynamic_http_client('https')
        $response = Http::withHeaders([
            'Authorization' => 'Bearer 1|aAroKE1BBxHrCXIpv1lTYDG7xce3dmFC73j4cFws',
            'accept' => 'application/json'
        ])->get($url);

        return $response->json();

    }

    public function top_referrers(){

        $json_response = $this->dynamic_http_client('https://api.mystaging.ml/api/fetchTopReferrers');

        return response()->json($json_response);
    }

    public function types_of_user(){

        $json_response = $this->dynamic_http_client('https://api.mystaging.ml/api/fetchUserTypes');

        return response()->json($json_response);

    }

    public function top_browsers(){

        $json_response = $this->dynamic_http_client('https://api.mystaging.ml/api/fetchTopBrowsers');

        return response()->json($json_response);
    }

    public function device_category(){

        $json_response = $this->dynamic_http_client('https://api.mystaging.ml/api/DeviceCategory');

        return response()->json($json_response);

    }

    
}
