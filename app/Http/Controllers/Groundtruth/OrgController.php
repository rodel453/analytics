<?php

namespace App\Http\Controllers\Groundtruth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Http;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;

class OrgController extends Controller
{
    
    public function ads_org_totals(){

        return view('groundtruth.org.totals');
    }

    public function fetch_ads_org_totals(Request $request){

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
        ])->get('https://reporting.groundtruth.com/demand/v1/org/1051154/totals?start_date='.$start_date.'&end_date='.$end_date.'');
        
        $ads_data = $response->json();

        foreach($ads_data as $ad){
            
            $ads[] = [
                'campaign_id' => $ad['campaign_id'],
                'account_id' => $ad['account_id'],
                'cumulative_reach' => $ad['cumulative_reach'],
                'campaign_name' => $ad['campaign_name'],
            ];

        }

        return Datatables::of($ads)->make(true);
        
    }

}
