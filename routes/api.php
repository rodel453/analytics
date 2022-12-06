<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    return response('Test API', 200)
                  ->header('Content-Type', 'application/json');
});

Route::get('/chart-data', [App\Http\Controllers\Groundtruth\CampaignController::class, 'fetch_ads_campaign_daily_view']);




