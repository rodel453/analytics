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
        
        $top_browsers = $this->dynamic_http_client('https://api.mystaging.ml/api/fetchTopBrowsers');

        $user_website = User::find(auth()->user()->id)->websites()->get();
        $website_data = $this->load_website_data();
        return view('frontend.dashboard', compact('user_website', 'website_data', 'latest_page_views', 'top_browsers'));
    }
    }
    public function load_website_data(){

        $website_data = Website::where('user_id', auth()->user()->id)->first();
        return $website_data;

    }

    public function dynamic_http_client($url){

        // Call for other Controller
        // App/Http/Controllers/Auth/AuthController
        // $reponse = AuthController::dynamic_http_client('https')
        $response = Http::withHeaders([
            'Authorization' => 'Bearer 4|eTHI19WxnLBjMjRyO2nqLQkWAIQFa74QuJ3GiBQq',
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
    
}
