<?php

namespace App\Http\Controllers\Groundtruth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Http;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;

class AdgroupsController extends Controller
{
    //Pages

    public function ads_adgroup_daily(){

        return view('groundtruth.adgroups.adgroup-daily');
    }

    public function ads_adgroup_total(){

        return view('groundtruth.adgroups.adgroup-totals');
    }

    public function ads_adgroup_locations(){

        return view('groundtruth.adgroups.adgroup-locations');
    }

    public function ads_adgroup_sv_locations(){

        return view('groundtruth.adgroups.adgroup-sv-locations');
    }

    public function ads_adgroups_product(){

        return view('groundtruth.adgroups.adgroups-product');
    }

    public function ads_adgroups_behavioral_audience(){

        return view('groundtruth.adgroups.adgroups-behavioral-audience');
    }

    public function ads_adgroups_category(){

        return view('groundtruth.adgroups.adgroups-category');
    }

    public function ads_adgroups_brand_affinity(){

        return view('groundtruth.adgroups.adgroups-brand-affinity');
    }

    public function ads_adgroups_device_type(){

        return view('groundtruth.adgroups.adgroups-device_type');
    }

    //Fetch Table for Groundtruth Adgroups

    public function fetch_ads_adgroup_daily(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/adgroup/5677387/daily?start_date='.$start_date.'&end_date='.$end_date.'&all_creatives=1');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'adgroup_id' => $ad['adgroup_id'],
                'creative_id' => $ad['creative_id'],
                'creative_name' => $ad['creative_name'],
                'campaign_name' => $ad['campaign_name'],
                'adgroup_name' => $ad['adgroup_name'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }

    public function fetch_ads_adgroup_totals(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/adgroup/5677387/totals?start_date='.$start_date.'&end_date='.$end_date.'&all_creatives=1');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'adgroup_id' => $ad['adgroup_id'],
                'creative_id' => $ad['creative_id'],
                'creative_name' => $ad['creative_name'],
                'campaign_name' => $ad['campaign_name'],
                'adgroup_name' => $ad['adgroup_name'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }

    public function fetch_ads_adgroup_locations(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/adgroup/locations/5677387?start_date='.$start_date.'&end_date='.$end_date.'&location_type=zipcode&key=0');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'campaign_id' => $ad['campaign_id'],
                'campaign_name' => $ad['campaign_name'],
                'city' => $ad['city'],
                'zip' => $ad['zip'],
                'country' => $ad['country'],
                'state' => $ad['state'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }

    public function fetch_ads_adgroup_sv_locations(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/adgroup/sv_locations/5677387?start_date='.$start_date.'&end_date='.$end_date.'&location_type=address');
        
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

    public function fetch_ads_adgroups_product(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/adgroups/product/953027?start_date='.$start_date.'&end_date='.$end_date.'&all_adgroups=1');
        
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

    public function fetch_ads_adgroups_behavioral(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/adgroups/behavioral_audience/1040130?start_date='.$start_date.'&end_date='.$end_date.'&all_adgroups=1');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'adgroup_id' => $ad['adgroup_id'],
                'adgroup_name' => $ad['adgroup_name'],
                'a_name' => $ad['a_name'],
                'ctr' => $ad['ctr'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }

    public function fetch_ads_adgroups_category(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/adgroups/category/1040130?start_date='.$start_date.'&end_date='.$end_date.'&all_adgroups=1');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'adgroup_id' => $ad['adgroup_id'],
                'adgroup_name' => $ad['adgroup_name'],
                'a_name' => $ad['a_name'],
                'ctr' => $ad['ctr'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }

    public function fetch_ads_adgroups_brand(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/adgroups/brand_affinity/1040130?start_date='.$start_date.'&end_date='.$end_date.'&all_adgroups=1');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'adgroup_id' => $ad['adgroup_id'],
                'adgroup_name' => $ad['adgroup_name'],
                'a_name' => $ad['a_name'],
                'ctr' => $ad['ctr'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }

    public function fetch_ads_adgroups_device(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/adgroups/device_type/1040130?start_date='.$start_date.'&end_date='.$end_date.'&all_adgroups=1');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'adgroup_id' => $ad['adgroup_id'],
                'adgroup_name' => $ad['adgroup_name'],
                'a_name' => $ad['a_name'],
                'ctr' => $ad['ctr'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }
}
