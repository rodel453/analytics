<?php

namespace App\Http\Controllers\Groundtruth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Http;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;

class CreativesController extends Controller
{
    //Pages

    public function ads_creatives_product(){

        return view('groundtruth.creatives.product');
    }

    public function ads_creatives_daily(){

        return view('groundtruth.creatives.daily');
    }

    public function ads_creatives_behavioral_audience(){

        return view('groundtruth.creatives.behavioral-audience');
    }

    public function ads_creatives_category(){

        return view('groundtruth.creatives.category');
    }

    public function ads_creatives_brand_affinity(){

        return view('groundtruth.creatives.brand-affinity');
    }


    //Fetching Data
    public function fetch_ads_creatives_product(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/creatives/product/953027?start_date='.$start_date.'&end_date='.$end_date.'&all_adgroups=1');
        
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

    public function fetch_ads_creatives_daily(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/creatives/953027/daily?start_date='.$start_date.'&end_date='.$start_date.'');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'creative_id' => $ad['creative_id'],
                'adgroup_id' => $ad['adgroup_id'],
                'campaign_id' => $ad['campaign_id'],
                'creative_url' => $ad['creative_url'],
                'date' => $ad['date'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }

    public function fetch_ads_creatives_behavioral(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/creatives/behavioral_audience/1040130?start_date='.$start_date.'&end_date='.$end_date.'');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'creatives_id' => $ad['creatives_id'],
                'creatives_name' => $ad['creatives_name'],
                'ctr' => $ad['ctr'],
                'sar' => $ad['sar'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }

    public function fetch_ads_creatives_category(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/creatives/category/1040130?start_date='.$start_date.'&end_date='.$end_date.'');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'creatives_id' => $ad['creatives_id'],
                'creatives_name' => $ad['creatives_name'],
                'ctr' => $ad['ctr'],
                'sar' => $ad['sar'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }

    public function fetch_ads_creatives_brand(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/creatives/brand_affinity/1040130?start_date='.$start_date.'&end_date='.$end_date.'');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'creatives_id' => $ad['creatives_id'],
                'creatives_name' => $ad['creatives_name'],
                'ctr' => $ad['ctr'],
                'sar' => $ad['sar'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }

}
