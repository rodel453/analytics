<?php

namespace App\Http\Controllers\Groundtruth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Http;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;


class CampaignController extends Controller
{

    //View-Pages

    public function ads_campaign_daily_view($group_id){

        $response = Http::withHeaders([
            'X-GT-USER-ID' => '100024',
            'X-GT-API-KEY' => 'uhCEo5z$fhWsJxzp'
        ])->get('https://reporting.groundtruth.com/demand/v1/adgroup/'.$group_id.'/daily?start_date=2022-09-01&end_date=2022-09-07&all_adgroups=1');
        
        $ads_data = $response->json()[0];
        
        
        return view('groundtruth.campaign.campaign-view.campaign-daily-view',compact('ads_data'));
    }


    //Pages

    public function ads_campaign_daily(){

        return view('groundtruth.campaign.campaign-daily');
    }

    public function ads_campaign_totals(){

        return view('groundtruth.campaign.campaign-totals');
    }

    public function ads_campaign_product(){

        return view('groundtruth.campaign.campaign-product');
    }

    public function ads_campaign_locations(){

        return view('groundtruth.campaign.campaign-locations');
    }

    public function ads_campaign_sv_locations(){

        return view('groundtruth.campaign.campaign-sv-locations');
    }

    public function ads_campaign_behavioral_audience(){

        return view('groundtruth.campaign.campaign-behavioral-audience');
    }

    public function ads_campaign_category(){

        return view('groundtruth.campaign.campaign-category');
    }

    public function ads_campaign_brand_affinity(){

        return view('groundtruth.campaign.campaign-brand-affinity');
    }

    public function ads_campaign_demographic(){

        return view('groundtruth.campaign.campaign-demographic');
    }

    public function ads_campaign_device_type(){

        return view('groundtruth.campaign.campaign-device-type');
    }

    // Fetching data

    public function fetch_ads_campaign_daily(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/campaign/953027/daily?start_date='.$start_date.'&end_date='.$end_date.'&all_adgroups=1');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'adgroup_id' => $ad['adgroup_id'],
                'campaign_name' => $ad['campaign_name'],
                'adgroup_name' => $ad['adgroup_name'],
                'adgroup_status' => $ad['adgroup_status'],
                'date' => $ad['date'],
                'prj_vst' => $ad['prj_vst'],

            ];

        }

       

        return Datatables::of($ads)                    
        ->addIndexColumn()
        ->addColumn('action', function($row) use (&$ads_data){
                // $temp = [];
                // foreach ($ads_data as $key => $ad) {
                //     $temp[] = 
                // }

               $variable = json_encode($row['adgroup_id']);

               $btn = '<a href="/ads/campaign-daily/campaign-view/'.$variable.'" class="edit btn btn-info btn-sm mr-2" >Campaign</a>';
               $btn = $btn.'<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Adgroup</a>';

                return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
        
    }

    public function fetch_ads_campaign_totals(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/campaign/953027/totals?start_date='.$start_date.'&end_date='.$end_date.'&all_creatives=1');
        
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

    public function fetch_ads_campaign_product(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/campaign/product/953027?start_date='.$start_date.'&end_date='.$end_date.'');
        
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

    public function fetch_ads_campaign_locations(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/campaign/locations/953027?start_date='.$start_date.'&end_date='.$end_date.'&location_type=zipcode&key=0');
        
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

    public function fetch_ads_campaign_sv_locations(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/campaign/sv_locations/953027?start_date='.$start_date.'&end_date='.$end_date.'&location_type=address');
        
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

    public function fetch_ads_campaign_behavioral(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/campaign/behavioral_audience/1040130?start_date='.$start_date.'&end_date='.$end_date.'');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'campaign_id' => $ad['campaign_id'],
                'campaign_name' => $ad['campaign_name'],
                'ctr' => $ad['ctr'],
                'sar' => $ad['sar'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }

    public function fetch_ads_campaign_category(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/campaign/category/1040130?start_date='.$start_date.'&end_date='.$end_date.'');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'campaign_id' => $ad['campaign_id'],
                'campaign_name' => $ad['campaign_name'],
                'ctr' => $ad['ctr'],
                'sar' => $ad['sar'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }

    public function fetch_ads_campaign_brand(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/campaign/brand_affinity/1040130?start_date='.$start_date.'&end_date='.$end_date.'');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'campaign_id' => $ad['campaign_id'],
                'campaign_name' => $ad['campaign_name'],
                'ctr' => $ad['ctr'],
                'sar' => $ad['sar'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }

    public function fetch_ads_campaign_demographic(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/campaign/demographic/1040130?start_date='.$start_date.'&end_date='.$end_date.'&all_adgroups=1&key=3');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'campaign_id' => $ad['campaign_id'],
                'campaign_name' => $ad['campaign_name'],
                'ctr' => $ad['ctr'],
                'sar' => $ad['sar'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }

    public function fetch_ads_campaign_device(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/campaign/device_type/1040130?start_date='.$start_date.'&end_date='.$end_date.'');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'campaign_id' => $ad['campaign_id'],
                'campaign_name' => $ad['campaign_name'],
                'ctr' => $ad['ctr'],
                'pub_type' => $ad['pub_type'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }


    public function fetch_ads_campaign_daily_chart(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/campaign/953027/daily?start_date='.$start_date.'&end_date='.$end_date.'&all_adgroups=1');
        
        $ads_data = $response->json();
        
        $ads_final_array = [];
        $ads_date = [];
      
        foreach($ads_data as $ad){

            $ads_date[] = $ad['date'];
            $ads[] = $ad['adgroup_id'];

        }
        
        // $data_test = $ads;
        // $date = $ads_date;
        $ads_data['campaign_adgroup_id'] = array_unique($ads);
        $date_ads['campaign_adgroup_date'] = array_unique($ads_date);
        
        foreach($ads_data['campaign_adgroup_id'] as $id){

                foreach($ads_data as $ads){
                
                    if(isset($ads['adgroup_id'])&&$ads['adgroup_id'] == $id){

                        $ads_final_array[$id][] = $ads;
                    }
                    
                }

        }
    
    $ads_date_array =  array_values($date_ads['campaign_adgroup_date']);
    $ads_final_array['campaign_adgroup_id'] = $ads;

    foreach ($ads_date_array as $date_array) {

          $ads_final_array['campaign_adgroup_date'][] = date('M j', strtotime($date_array));
    }

    return $ads_final_array;

    }

}
