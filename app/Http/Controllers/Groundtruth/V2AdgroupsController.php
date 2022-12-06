<?php

namespace App\Http\Controllers\Groundtruth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Http;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;

class V2AdgroupsController extends Controller
{
    
     //Pages
    public function ads_v2_adgroups_product(){

        return view('groundtruth.v2adgroups.v2-product');
    }

    public function ads_v2_adgroups_behavioral_audience(){

        return view('groundtruth.v2adgroups.v2-behavioral-audience');
    }

    public function ads_v2_adgroups_category(){

        return view('groundtruth.v2adgroups.v2-category');
    }

    public function ads_v2_adgroups_brand_affinity(){

        return view('groundtruth.v2adgroups.v2-brand-affinity');
    }

    public function ads_v2_adgroups_sv_locations(){

        return view('groundtruth.v2adgroups.v2-sv-locations');
    }

    public function ads_v2_adgroups_publisher(){

        return view('groundtruth.v2adgroups.v2-publisher');
    }

        // Fetch Data
        public function fetch_ads_v2_adgroups_product(Request $request){

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
            ])->get('https://reporting.groundtruth.com/demand/v2/adgroups/product/953027?start_date='.$start_date.'&end_date='.$end_date.'');
            
            $ads_data = $response->json();
    
            foreach($ads_data as $ad){
                
                $ads[] = [
                    'adgroup_id' => $ad['adgroup_id'],
                    'adgroup_name' => $ad['adgroup_name'],
                    'product_group' => $ad['product_group'],
                    'product' => $ad['product'],
                ];
    
            }
    
            return Datatables::of($ads)->make(true);
            
        }

        public function fetch_ads_v2_adgroups_behavioral(Request $request){

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
            ])->get('https://reporting.groundtruth.com/demand/v2/adgroups/behavioral_audience/953027?start_date='.$start_date.'&end_date='.$end_date.'');
            
            $ads_data = $response->json();
    
            foreach($ads_data as $ad){
                
                $ads[] = [
                    'adgroup_id' => $ad['adgroup_id'],
                    'adgroup_name' => $ad['adgroup_name'],
                    'click_through_rate' => $ad['click_through_rate'],
                    'secondary_action_rate' => $ad['secondary_action_rate'],
                ];
    
            }
    
            return Datatables::of($ads)->make(true);
            
        }

        public function fetch_ads_v2_adgroups_category(Request $request){

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
            ])->get('https://reporting.groundtruth.com/demand/v2/adgroups/category/953027?start_date='.$start_date.'&end_date='.$end_date.'');
            
            $ads_data = $response->json();
    
            foreach($ads_data as $ad){
                
                $ads[] = [
                    'adgroup_id' => $ad['adgroup_id'],
                    'adgroup_name' => $ad['adgroup_name'],
                    'click_through_rate' => $ad['click_through_rate'],
                    'secondary_action_rate' => $ad['secondary_action_rate'],
                ];
    
            }
    
            return Datatables::of($ads)->make(true);
            
        }

        public function fetch_ads_v2_adgroups_brand(Request $request){

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
            ])->get('https://reporting.groundtruth.com/demand/v2/adgroups/brand_affinity/953027?start_date='.$start_date.'&end_date='.$end_date.'');
            
            $ads_data = $response->json();
    
            foreach($ads_data as $ad){
                
                $ads[] = [
                    'adgroup_id' => $ad['adgroup_id'],
                    'adgroup_name' => $ad['adgroup_name'],
                    'click_through_rate' => $ad['click_through_rate'],
                    'secondary_action_rate' => $ad['secondary_action_rate'],
                ];
    
            }
    
            return Datatables::of($ads)->make(true);
            
        }

        public function fetch_ads_v2_adgroups_publisher(Request $request){

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
            ])->get('https://reporting.groundtruth.com/demand/v2/adgroups/publisher/953027?start_date='.$start_date.'&end_date='.$end_date.'');
            
            $ads_data = $response->json();
    
            foreach($ads_data as $ad){
                
                $ads[] = [
                    'adgroup_id' => $ad['adgroup_id'],
                    'adgroup_name' => $ad['adgroup_name'],
                    'click_through_rate' => $ad['click_through_rate'],
                    'secondary_action_rate' => $ad['secondary_action_rate'],
                ];
    
            }
    
            return Datatables::of($ads)->make(true);
            
        }
    
        public function fetch_ads_v2_adgroups_sv_locations(Request $request){
    
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
            ])->get('https://reporting.groundtruth.com/demand/v2/adgroup/sv_locations/5677387?location_type=address&key=0&start_date='.$start_date.'&end_date='.$end_date.'');
            
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
