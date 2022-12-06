<?php

namespace App\Http\Controllers\Groundtruth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Http;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;

class V2CreativesController extends Controller
{
    

    //Pages
    public function ads_v2_creatives_product(){

        return view('groundtruth.v2creatives.v2-product');
    }

    public function ads_v2_creatives_behavioral_audience(){

        return view('groundtruth.v2creatives.v2-behavioral-audience');
    }

    public function ads_v2_creatives_category(){

        return view('groundtruth.v2creatives.v2-category');
    }

    public function ads_v2_brand_affinity(){

        return view('groundtruth.v2creatives.v2-brand-affinity');
    }



    //Fetch Data
    public function fetch_ads_v2_creatives_product(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v2/creatives/product/953027?start_date='.$start_date.'&end_date='.$end_date.'');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'creative_id' => $ad['creative_id'],
                'adgroup_id' => $ad['adgroup_id'],
                'creative_name' => $ad['creative_name'],
                'campaign_name' => $ad['campaign_name'],
                'product' => $ad['product'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }

    public function fetch_ads_v2_creatives_behavioral(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v2/creatives/behavioral_audience/953027?start_date='.$start_date.'&end_date='.$end_date.'');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'creative_id' => $ad['creative_id'],
                'creative_name' => $ad['creative_name'],
                'click_through_rate' => $ad['click_through_rate'],
                'secondary_action_rate' => $ad['secondary_action_rate'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }

    public function fetch_ads_v2_creatives_category(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v2/creatives/category/953027?start_date='.$start_date.'&end_date='.$end_date.'');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'creative_id' => $ad['creative_id'],
                'creative_name' => $ad['creative_name'],
                'click_through_rate' => $ad['click_through_rate'],
                'secondary_action_rate' => $ad['secondary_action_rate'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }

    public function fetch_ads_v2_creatives_brand(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v2/creatives/brand_affinity/953027?start_date='.$start_date.'&end_date='.$end_date.'');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'creative_id' => $ad['creative_id'],
                'creative_name' => $ad['creative_name'],
                'click_through_rate' => $ad['click_through_rate'],
                'secondary_action_rate' => $ad['secondary_action_rate'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }

}
