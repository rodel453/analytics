<?php

namespace App\Http\Controllers\Groundtruth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Http;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;

class V2CampaignController extends Controller
{
    //Pages
    public function ads_v2_campaign_product(){

        return view('groundtruth.v2campaign.v2-campaign-product');
    }

    public function ads_v2_campaign_behavioral_audience(){

        return view('groundtruth.v2campaign.v2-campaign-behavioral-audience');
    }

    public function ads_v2_campaign_category(){

        return view('groundtruth.v2campaign.v2-campaign-category');
    }

    public function ads_v2_campaign_brand_affinity(){

        return view('groundtruth.v2campaign.v2-campaign-brand-affinity');
    }

    public function ads_v2_campaign_sv_locations(){

        return view('groundtruth.v2campaign.v2-campaign-sv-locations');
    }

    public function ads_v2_campaign_publisher(){

        return view('groundtruth.v2campaign.v2-campaign-publisher');
    }


    // Fetch Data
    public function fetch_ads_v2_campaign_product(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v2/campaign/product/953027?start_date='.$start_date.'&end_date='.$end_date.'');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'campaign_id' => $ad['campaign_id'],
                'campaign_name' => $ad['campaign_name'],
                'product_group' => $ad['product_group'],
                'product' => $ad['product'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }

    public function fetch_ads_v2_campaign_behavioral(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v2/campaign/behavioral_audience/1040130?start_date='.$start_date.'&end_date='.$end_date.'');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'campaign_id' => $ad['campaign_id'],
                'campaign_name' => $ad['campaign_name'],
                'click_through_rate' => $ad['click_through_rate'],
                'secondary_action_rate' => $ad['secondary_action_rate'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }

    public function fetch_ads_v2_campaign_category(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v2/campaign/category/1040130?start_date='.$start_date.'&end_date='.$end_date.'');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'campaign_id' => $ad['campaign_id'],
                'campaign_name' => $ad['campaign_name'],
                'click_through_rate' => $ad['click_through_rate'],
                'secondary_action_rate' => $ad['secondary_action_rate'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }

    public function fetch_ads_v2_campaign_brand(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v2/campaign/brand_affinity/1040130?start_date='.$start_date.'&end_date='.$end_date.'');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'campaign_id' => $ad['campaign_id'],
                'campaign_name' => $ad['campaign_name'],
                'click_through_rate' => $ad['click_through_rate'],
                'secondary_action_rate' => $ad['secondary_action_rate'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }

    public function fetch_ads_v2_campaign_publisher(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v2/campaign/publisher/1040130?start_date='.$start_date.'&end_date='.$end_date.'');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'campaign_id' => $ad['campaign_id'],
                'campaign_name' => $ad['campaign_name'],
                'click_through_rate' => $ad['click_through_rate'],
                'secondary_action_rate' => $ad['secondary_action_rate'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }

    public function fetch_ads_v2_campaign_sv_locations(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v2/campaign/sv_locations/953027?start_date='.$start_date.'&end_date='.$end_date.'&location_type=address');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'campaign_id' => $ad['campaign_id'],
                'campaign_name' => $ad['campaign_name'],
                'company_name' => $ad['company_name'],
                'poi_id' => $ad['poi_id'],
                'address' => $ad['address'],
                'zip' => $ad['zip'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }


}
