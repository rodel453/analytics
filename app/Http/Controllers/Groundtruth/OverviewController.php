<?php

namespace App\Http\Controllers\Groundtruth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Http;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;

class OverviewController extends Controller
{

    public function index(){

        return view('groundtruth.overview');
    }

    public function ads_account_conversion_tracking(){

        return view('groundtruth.ads-account-conversion-tracking');
    }

    public function ads_account_adgroups_view($campaign_id){

        return view('groundtruth.ads-account-adgroup',compact('campaign_id'));
    }

    public function ads_account_campaign_view($campaign_id){

        return view('groundtruth.ads-account-campaign',compact('campaign_id'));
    }

    public function fetch_ads_account_campaign(Request $request, $campaign_id){

        $ads = new Collection;

                $all_groups1 = $request->query('end_date');
        $all_groups2 = $request->query('start_date');
   
 
        if(!empty($request->query('start_date'))){
            
            $start_date = $request->query('start_date');
            $end_date = $request->query('end_date');

        }else{
            $end_date = date('Y-m-d');
            $start_date = date('Y-m-d', strtotime("-7 days"));   
        }

        $response = Http::withHeaders([
            'X-GT-USER-ID' => '100024',
            'X-GT-API-KEY' => 'uhCEo5z$fhWsJxzp'
        ])->get('https://reporting.groundtruth.com/demand/v1/campaign/'.$campaign_id.'/daily?start_date='.$start_date.'&end_date='.$end_date.'');

        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'campaign_id' => $ad['campaign_id'],
                'campaign_name' => $ad['campaign_name'],
            ];

        }

        return Datatables::of($ads)->make(true);

    }

    public function fetch_ads_account_adgroups($campaign_id){

        $ads = new Collection;

        $response = Http::withHeaders([
            'X-GT-USER-ID' => '100024',
            'X-GT-API-KEY' => 'uhCEo5z$fhWsJxzp'
        ])->get('https://reporting.groundtruth.com/demand/v1/adgroups/product/'.$campaign_id.'?start_date=2022-08-05&end_date=2022-08-11');

        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'adgroup_id' => $ad['adgroup_id'],
                'product_group' => $ad['product_group'],
                'adgroup_name' => $ad['adgroup_name'],
                'product' => $ad['product'],
            ];

        }

        return Datatables::of($ads)->make(true);

    }

    


    public function fetch_ads_account(Request $request){

        $ads = new Collection;

        $all_groups1 = $request->query('end_date');
        $all_groups2 = $request->query('start_date');
   
 
        if(!empty($request->query('start_date'))){
            
            $start_date = $request->query('start_date');
            $end_date = $request->query('end_date');

        }else{
            $end_date = date('Y-m-d');
            $start_date = date('Y-m-d', strtotime("-7 days"));   
        }
        
        $response = Http::withHeaders([
            'X-GT-USER-ID' => '100024',
            'X-GT-API-KEY' => 'uhCEo5z$fhWsJxzp'
        ])->get('https://reporting.groundtruth.com/demand/v1/account/202034/totals?start_date='.$start_date.'&end_date='.$end_date.'&all_campaigns=1');
        
        $ads_data = $response->json();
           
        foreach($ads_data as $ad){
            
            $ads[] = [
                'campaign_id' => $ad['campaign_id'],
                'campaign_name' => $ad['campaign_name'],
                'open_hour_visits' => $ad['open_hour_visits'],
                'cumulative_reach' => $ad['cumulative_reach'],
            ];

        }
       
        return Datatables::of($ads)                    
        ->addIndexColumn()
        ->addColumn('action', function($row) use (&$ads_data){

               $variable = json_encode($row['campaign_id']);

               $btn = '<a href="/ads/account/campaign-view/'.$variable.'" class="btn btn-info btn-sm mr-2" >Campaign</a>';
               $btn = $btn.'<a href="/ads/account/adgroups-view/'.$variable.'" class="edit btn btn-primary btn-sm mr-2" >Adgroups</a>';
              

                return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
        
    }

    public function fetch_ads_account_conversion_tracking(Request $request){

        $ads = new Collection;

        $all_groups1 = $request->query('end_date');
        $all_groups2 = $request->query('start_date');
   
 
        if(!empty($request->query('start_date'))){
            
            $start_date = $request->query('start_date');
            $end_date = $request->query('end_date');

        }else{
            $end_date = date('Y-m-d');
            $start_date = date('Y-m-d', strtotime("-7 days"));   
        }

        $response = Http::withHeaders([
            'X-GT-USER-ID' => '100024',
            'X-GT-API-KEY' => 'uhCEo5z$fhWsJxzp'
        ])->get('https://reporting.groundtruth.com/demand/v1/account/conversion_tracking/202034?start_date='.$start_date.'&end_date='.$end_date.'&all_campaigns=1');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'campaign_name' => $ad['campaign_name'],
                'account_id' => $ad['account_id'],
                'adgroup_id' => $ad['adgroup_id'],
                'pixel_id' => $ad['pixel_id'],
                'campaign_id' => $ad['campaign_id'],
                'conversions' => $ad['conversions'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }


    
}
