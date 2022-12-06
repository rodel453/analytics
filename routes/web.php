<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UpdateProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AcquisitionController;
use App\Http\Controllers\EngagementController;
use App\Http\Controllers\MonetizationController;
use App\Http\Controllers\RetentionController;
use App\Http\Controllers\DemographicsController;
use App\Http\Controllers\TechController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Campaign\OverviewController;

// use Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can     register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('test', function(){
    return "This routes is working";
});


// Route for userTable in Admin
Route::get('admin/users/delete/{id}', [App\Http\Controllers\AdminController::class, 'delete'])->middleware('auth');
Route::get('admin/users/view/{id}', [App\Http\Controllers\AdminController::class, 'get_data'])->middleware('auth');
Route::get('admin/users/edit/{id}', [App\Http\Controllers\AdminController::class, 'get_data'])->middleware('auth');
Route::post('admin/users/update/', [App\Http\Controllers\AdminController::class, 'update'])->middleware('auth');
Route::get('admin/users', [App\Http\Controllers\AdminController::class, 'user_data'])->middleware('auth', 'admin_role');

// Route for newUserTable in Admin
Route::get('admin/new-users', [App\Http\Controllers\AdminController::class, 'new_user_data'])->middleware('auth', 'admin_role');

// Route for websiteTable in Admin
Route::get('admin/website', [App\Http\Controllers\AdminController::class, 'website_data'])->middleware('auth', 'admin_role');
Route::get('admin/website/campaign', [App\Http\Controllers\AdminController::class, 'campaign'])->middleware('auth');
Route::get('admin/website/analytics', [App\Http\Controllers\AdminController::class, 'analytics'])->middleware('auth');
Route::get('admin/website/status-update/{id}/{status}', [App\Http\Controllers\AdminController::class, 'status_update'])->middleware('auth');


//Route for users
Route::get('website', [App\Http\Controllers\UserController::class, 'website_user'])->middleware('auth');
Route::post('/website-create', [App\Http\Controllers\UserController::class, 'website_store'])->middleware('auth');
Route::get('/website/edit/{id}', [App\Http\Controllers\UserController::class, 'get_websiteData'])->middleware('auth');
Route::get('/website/delete/{id}', [App\Http\Controllers\UserController::class, 'website_delete'])->middleware('auth');
Route::post('/website/update/', [App\Http\Controllers\UserController::class, 'website_update'])->middleware('auth');
Route::get('/user/fetch_website/{id}', [App\Http\Controllers\UserController::class, 'fetch_website_data'])->middleware('auth');

//Route for Report Pages
Route::get('reports-snapshot', [App\Http\Controllers\ReportController::class, 'reports_snapshot'])->middleware('auth');
Route::get('realtime', [App\Http\Controllers\ReportController::class, 'realtime'])->middleware('auth');


//Route for Acquisition Pages
Route::get('acquisition-overview', [App\Http\Controllers\AcquisitionController::class, 'acquisition_overview'])->middleware('auth');
Route::get('user-acquisition', [App\Http\Controllers\AcquisitionController::class, 'user_acquisition'])->middleware('auth');
Route::get('traffic-acquisition', [App\Http\Controllers\AcquisitionController::class, 'traffic_acquisition'])->middleware('auth');

//Route for Engagement Pages
Route::get('engagement-overview', [App\Http\Controllers\EngagementController::class, 'engagement_overview'])->middleware('auth');
Route::get('events', [App\Http\Controllers\EngagementController::class, 'events'])->middleware('auth');
Route::get('conversions', [App\Http\Controllers\EngagementController::class, 'conversions'])->middleware('auth');
Route::get('pages-screens', [App\Http\Controllers\EngagementController::class, 'pages_screens'])->middleware('auth');

//Route for Monetization Pages
Route::get('monetization-overview', [App\Http\Controllers\MonetizationController::class, 'monetization_overview'])->middleware('auth');
Route::get('ecommerce-purchases', [App\Http\Controllers\MonetizationController::class, 'ecommerce_purchases'])->middleware('auth');
Route::get('inapp-purchases', [App\Http\Controllers\MonetizationController::class, 'inapp_purchases'])->middleware('auth');
Route::get('publisher-ads', [App\Http\Controllers\MonetizationController::class, 'publisher_ads'])->middleware('auth');

//Route for Retention Page
Route::get('retention', [App\Http\Controllers\RetentionController::class, 'index'])->middleware('auth');

//Route for Demographics Pages
Route::get('demographics-overview', [App\Http\Controllers\DemographicsController::class, 'demographics_overview'])->middleware('auth');
Route::get('demographics-details', [App\Http\Controllers\DemographicsController::class, 'demographics_details'])->middleware('auth');

//Route for Tech Pages
Route::get('tech-overview', [App\Http\Controllers\TechController::class, 'tech_overview'])->middleware('auth');
Route::get('tech-details', [App\Http\Controllers\TechController::class, 'tech_details'])->middleware('auth');

//This route is for dashboard of both user and admin page
Route::get('/', [App\Http\Controllers\Auth\AuthController::class, 'redirectTo'])->middleware('auth','PreventBackHistory')->name('dashboard');

// This middleware is to prevent users from using the back button in browser
Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});

// Route::get('/admin/users', [App\HTTP\Controllers\AdminController::class, 'user_view'])->middleware('auth');


// Route::get('/index/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard')->middleware('auth');
// Route::get('/index/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.dashboard')->middleware('auth');


// This route is for profile page
Route::controller(UpdateProfileController::class)->prefix('profile')->middleware('auth','PreventBackHistory')->group(function () {
    Route::get('/','index');
    Route::post('/update-user', 'update')->name('update-user');
    Route::post('/update-password', 'updatePassword')->name('update-password');
    Route::post('/update-picture','updatePicture')->name('PictureUpdate');

});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth','PreventBackHistory');
Route::post('/mark-as-read', [App\Http\Controllers\HomeController::class, 'markNotification'])->name('markNotification')->middleware('auth');

// This route is for logout of both admin and user
Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'logout'])->middleware('auth');

Route::get('get/analytics-data', [App\Http\Controllers\Auth\AuthController::class, 'top_referrers'])->middleware('auth');
Route::get('get/users-type', [App\Http\Controllers\Auth\AuthController::class, 'types_of_user'])->middleware('auth');
Route::get('get/top-browsers', [App\Http\Controllers\Auth\AuthController::class, 'top_browsers'])->middleware('auth');
Route::get('get/device-category', [App\Http\Controllers\Auth\AuthController::class, 'device_category'])->middleware('auth');
Route::get('get/users-language', [App\Http\Controllers\DemographicsController::class, 'users_language'])->middleware('auth');
Route::get('get/users-browser', [App\Http\Controllers\TechController::class, 'users_browser'])->middleware('auth');
Route::get('get/users-resolution', [App\Http\Controllers\TechController::class, 'users_resolution'])->middleware('auth');
// Route::get('get/top-country', [App\Http\Controllers\Auth\AuthController::class, 'top_country'])->middleware('auth');

//Route for Groundtruth Account Pages
Route::get('/ads/account', [App\Http\Controllers\Groundtruth\OverviewController::class, 'index'])->middleware('auth');
Route::get('/ads/account-conversion-tracking', [App\Http\Controllers\Groundtruth\OverviewController::class, 'ads_account_conversion_tracking'])->middleware('auth');
Route::get('/ads/account/adgroups-view/{campaign_id}', [App\Http\Controllers\Groundtruth\OverviewController::class, 'ads_account_adgroups_view'])->middleware('auth');
Route::get('/get/account/table-account-adgroups/{campaign_id}', [App\Http\Controllers\Groundtruth\OverviewController::class, 'fetch_ads_account_adgroups'])->middleware('auth');

Route::get('/ads/account/campaign-view/{campaign_id}', [App\Http\Controllers\Groundtruth\OverviewController::class, 'ads_account_campaign_view'])->middleware('auth');
Route::get('/get/account/table-account-campaign/{campaign_id}', [App\Http\Controllers\Groundtruth\OverviewController::class, 'fetch_ads_account_campaign'])->middleware('auth');


//Route for Groundtruth Account fetch table data
Route::get('/get/table-account', [App\Http\Controllers\Groundtruth\OverviewController::class, 'fetch_ads_account'])->middleware('auth');
Route::get('/get/table-account-conversion-tracking', [App\Http\Controllers\Groundtruth\OverviewController::class, 'fetch_ads_account_conversion_tracking'])->middleware('auth');

Route::get('/ads/campaign-daily', [App\Http\Controllers\Groundtruth\CampaignController::class, 'ads_campaign_daily'])->middleware('auth');
Route::get('/ads/campaign-totals', [App\Http\Controllers\Groundtruth\CampaignController::class, 'ads_campaign_totals'])->middleware('auth');
Route::get('/ads/campaign-product', [App\Http\Controllers\Groundtruth\CampaignController::class, 'ads_campaign_product'])->middleware('auth');
Route::get('/ads/campaign-locations', [App\Http\Controllers\Groundtruth\CampaignController::class, 'ads_campaign_locations'])->middleware('auth');
Route::get('/ads/campaign-sv-locations', [App\Http\Controllers\Groundtruth\CampaignController::class, 'ads_campaign_sv_locations'])->middleware('auth');
Route::get('/ads/campaign-behavioral-audience', [App\Http\Controllers\Groundtruth\CampaignController::class, 'ads_campaign_behavioral_audience'])->middleware('auth');
Route::get('/ads/campaign-category', [App\Http\Controllers\Groundtruth\CampaignController::class, 'ads_campaign_category'])->middleware('auth');
Route::get('/ads/campaign-brand-affinity', [App\Http\Controllers\Groundtruth\CampaignController::class, 'ads_campaign_brand_affinity'])->middleware('auth');
Route::get('/ads/campaign-demographic', [App\Http\Controllers\Groundtruth\CampaignController::class, 'ads_campaign_demographic'])->middleware('auth');
Route::get('/ads/campaign-device-type', [App\Http\Controllers\Groundtruth\CampaignController::class, 'ads_campaign_device_type'])->middleware('auth');

Route::get('/ads/campaign-daily/campaign-view/{group_id}', [App\Http\Controllers\Groundtruth\CampaignController::class, 'ads_campaign_daily_view'])->middleware('auth');


//Route for Groundtruth Campaign fetch table data
Route::get('/get/table-campaign-daily', [App\Http\Controllers\Groundtruth\CampaignController::class, 'fetch_ads_campaign_daily'])->middleware('auth');
Route::get('/get/table-campaign-totals', [App\Http\Controllers\Groundtruth\CampaignController::class, 'fetch_ads_campaign_totals'])->middleware('auth');
Route::get('/get/table-campaign-product', [App\Http\Controllers\Groundtruth\CampaignController::class, 'fetch_ads_campaign_product'])->middleware('auth');
Route::get('/get/table-campaign-locations', [App\Http\Controllers\Groundtruth\CampaignController::class, 'fetch_ads_campaign_locations'])->middleware('auth');
Route::get('/get/table-campaign-sv-locations', [App\Http\Controllers\Groundtruth\CampaignController::class, 'fetch_ads_campaign_sv_locations'])->middleware('auth');
Route::get('/get/table-campaign-behavioral', [App\Http\Controllers\Groundtruth\CampaignController::class, 'fetch_ads_campaign_behavioral'])->middleware('auth');
Route::get('/get/table-campaign-category', [App\Http\Controllers\Groundtruth\CampaignController::class, 'fetch_ads_campaign_category'])->middleware('auth');
Route::get('/get/table-campaign-brand', [App\Http\Controllers\Groundtruth\CampaignController::class, 'fetch_ads_campaign_brand'])->middleware('auth');
Route::get('/get/table-campaign-demographic', [App\Http\Controllers\Groundtruth\CampaignController::class, 'fetch_ads_campaign_demographic'])->middleware('auth');
Route::get('/get/table-campaign-device', [App\Http\Controllers\Groundtruth\CampaignController::class, 'fetch_ads_campaign_device'])->middleware('auth');

//Route for Groundtruth Creatives Pages
Route::get('/ads/creatives-product', [App\Http\Controllers\Groundtruth\CreativesController::class, 'ads_creatives_product'])->middleware('auth');
Route::get('/ads/creatives-daily', [App\Http\Controllers\Groundtruth\CreativesController::class, 'ads_creatives_daily'])->middleware('auth');
Route::get('/ads/creatives-behavioral-audience', [App\Http\Controllers\Groundtruth\CreativesController::class, 'ads_creatives_behavioral_audience'])->middleware('auth');
Route::get('/ads/creatives-category', [App\Http\Controllers\Groundtruth\CreativesController::class, 'ads_creatives_category'])->middleware('auth');
Route::get('/ads/creatives-brand-affinity', [App\Http\Controllers\Groundtruth\CreativesController::class, 'ads_creatives_brand_affinity'])->middleware('auth');


//Route for Groundtruth Creatives fetch table data
Route::get('/get/table-creatives-product', [App\Http\Controllers\Groundtruth\CreativesController::class, 'fetch_ads_creatives_product'])->middleware('auth');
Route::get('/get/table-creatives-daily', [App\Http\Controllers\Groundtruth\CreativesController::class, 'fetch_ads_creatives_daily'])->middleware('auth');
Route::get('/get/table-creatives-behavioral', [App\Http\Controllers\Groundtruth\CreativesController::class, 'fetch_ads_creatives_behavioral'])->middleware('auth');
Route::get('/get/table-creatives-category', [App\Http\Controllers\Groundtruth\CreativesController::class, 'fetch_ads_creatives_category'])->middleware('auth');
Route::get('/get/table-creatives-brand', [App\Http\Controllers\Groundtruth\CreativesController::class, 'fetch_ads_creatives_brand'])->middleware('auth');

//Route for Groundtruth Adgroups Pages
Route::get('/ads/adgroup-daily', [App\Http\Controllers\Groundtruth\AdgroupsController::class, 'ads_adgroup_daily'])->middleware('auth');
Route::get('/ads/adgroup-totals', [App\Http\Controllers\Groundtruth\AdgroupsController::class, 'ads_adgroup_total'])->middleware('auth');
Route::get('/ads/adgroup-locations', [App\Http\Controllers\Groundtruth\AdgroupsController::class, 'ads_adgroup_locations'])->middleware('auth');
Route::get('/ads/adgroup-sv-locations', [App\Http\Controllers\Groundtruth\AdgroupsController::class, 'ads_adgroup_sv_locations'])->middleware('auth');
Route::get('/ads/adgroups-product', [App\Http\Controllers\Groundtruth\AdgroupsController::class, 'ads_adgroups_product'])->middleware('auth');
Route::get('/ads/adgroups-behavioral-audience', [App\Http\Controllers\Groundtruth\AdgroupsController::class, 'ads_adgroups_behavioral_audience'])->middleware('auth');
Route::get('/ads/adgroups-category', [App\Http\Controllers\Groundtruth\AdgroupsController::class, 'ads_adgroups_category'])->middleware('auth');
Route::get('/ads/adgroups-brand-affinity', [App\Http\Controllers\Groundtruth\AdgroupsController::class, 'ads_adgroups_brand_affinity'])->middleware('auth');
Route::get('/ads/adgroups-device-type', [App\Http\Controllers\Groundtruth\AdgroupsController::class, 'ads_adgroups_device_type'])->middleware('auth');

//Route for Groundtruth Adgroups fetchh table data
Route::get('/get/table-adgroup-daily', [App\Http\Controllers\Groundtruth\AdgroupsController::class, 'fetch_ads_adgroup_daily'])->middleware('auth');
Route::get('/get/table-adgroup-totals', [App\Http\Controllers\Groundtruth\AdgroupsController::class, 'fetch_ads_adgroup_totals'])->middleware('auth');
Route::get('/get/table-adgroup-locations', [App\Http\Controllers\Groundtruth\AdgroupsController::class, 'fetch_ads_adgroup_locations'])->middleware('auth');
Route::get('/get/table-adgroup-sv-locations', [App\Http\Controllers\Groundtruth\AdgroupsController::class, 'fetch_ads_adgroup_sv_locations'])->middleware('auth');
Route::get('/get/table-adgroups-product', [App\Http\Controllers\Groundtruth\AdgroupsController::class, 'fetch_ads_adgroups_product'])->middleware('auth');
Route::get('/get/table-adgroups-behavioral', [App\Http\Controllers\Groundtruth\AdgroupsController::class, 'fetch_ads_adgroups_behavioral'])->middleware('auth');
Route::get('/get/table-adgroups-category', [App\Http\Controllers\Groundtruth\AdgroupsController::class, 'fetch_ads_adgroups_category'])->middleware('auth');
Route::get('    ', [App\Http\Controllers\Groundtruth\AdgroupsController::class, 'fetch_ads_adgroups_brand'])->middleware('auth');
Route::get('/get/table-adgroups-device', [App\Http\Controllers\Groundtruth\AdgroupsController::class, 'fetch_ads_adgroups_device'])->middleware('auth');



//Route for Groundtruth Org Pages
Route::get('/ads/org-totals', [App\Http\Controllers\Groundtruth\OrgController::class, 'ads_org_totals'])->middleware('auth');

//Route for Groundtruth Org fetch table data
Route::get('/get/table-org-totals', [App\Http\Controllers\Groundtruth\OrgController::class, 'fetch_ads_org_totals'])->middleware('auth');

//Route for Groundtruth v2 Campaign Pages
Route::get('/ads/v2/campaign-product', [App\Http\Controllers\Groundtruth\V2CampaignController::class, 'ads_v2_campaign_product'])->middleware('auth');
Route::get('/ads/v2/campaign-behavioral-audience', [App\Http\Controllers\Groundtruth\V2CampaignController::class, 'ads_v2_campaign_behavioral_audience'])->middleware('auth');
Route::get('/ads/v2/campaign-category', [App\Http\Controllers\Groundtruth\V2CampaignController::class, 'ads_v2_campaign_category'])->middleware('auth');
Route::get('/ads/v2/campaign-brand-affinity', [App\Http\Controllers\Groundtruth\V2CampaignController::class, 'ads_v2_campaign_brand_affinity'])->middleware('auth');
Route::get('/ads/v2/campaign-sv-locations', [App\Http\Controllers\Groundtruth\V2CampaignController::class, 'ads_v2_campaign_sv_locations'])->middleware('auth');
Route::get('/ads/v2/campaign-publisher', [App\Http\Controllers\Groundtruth\V2CampaignController::class, 'ads_v2_campaign_publisher'])->middleware('auth');

//Route for Groundtruth v2 Campaign fetch table data
Route::get('/get/v2/table-campaign-product', [App\Http\Controllers\Groundtruth\V2CampaignController::class, 'fetch_ads_v2_campaign_product'])->middleware('auth');
Route::get('/get/v2/table-campaign-behavioral', [App\Http\Controllers\Groundtruth\V2CampaignController::class, 'fetch_ads_v2_campaign_behavioral'])->middleware('auth');
Route::get('/get/v2/table-campaign-category', [App\Http\Controllers\Groundtruth\V2CampaignController::class, 'fetch_ads_v2_campaign_category'])->middleware('auth');
Route::get('/get/v2/table-campaign-brand', [App\Http\Controllers\Groundtruth\V2CampaignController::class, 'fetch_ads_v2_campaign_brand'])->middleware('auth');
Route::get('/get/v2/table-campaign-publisher', [App\Http\Controllers\Groundtruth\V2CampaignController::class, 'fetch_ads_v2_campaign_publisher'])->middleware('auth');
Route::get('/get/v2/table-campaign-sv-locations', [App\Http\Controllers\Groundtruth\V2CampaignController::class, 'fetch_ads_v2_campaign_sv_locations'])->middleware('auth');

//Route for Groundtruth v2 Creatives Pages
Route::get('/ads/v2/creatives-product', [App\Http\Controllers\Groundtruth\V2CreativesController::class, 'ads_v2_creatives_product'])->middleware('auth');
Route::get('/ads/v2/creatives-behavioral-audience', [App\Http\Controllers\Groundtruth\V2CreativesController::class, 'ads_v2_creatives_behavioral_audience'])->middleware('auth');
Route::get('/ads/v2/creatives-category', [App\Http\Controllers\Groundtruth\V2CreativesController::class, 'ads_v2_creatives_category'])->middleware('auth');
Route::get('/ads/v2/creatives-brand-affinity', [App\Http\Controllers\Groundtruth\V2CreativesController::class, 'ads_v2_brand_affinity'])->middleware('auth');


//Route for Groundtruth v2 Creatives fetch table data
Route::get('/get/v2/table-creatives-product', [App\Http\Controllers\Groundtruth\V2CreativesController::class, 'fetch_ads_v2_creatives_product'])->middleware('auth');
Route::get('/get/v2/table-creatives-behavioral', [App\Http\Controllers\Groundtruth\V2CreativesController::class, 'fetch_ads_v2_creatives_behavioral'])->middleware('auth');
Route::get('/get/v2/table-creatives-category', [App\Http\Controllers\Groundtruth\V2CreativesController::class, 'fetch_ads_v2_creatives_category'])->middleware('auth');
Route::get('/get/v2/table-creatives-brand', [App\Http\Controllers\Groundtruth\V2CreativesController::class, 'fetch_ads_v2_creatives_brand'])->middleware('auth');

//Route for Groundtruth Adgroups Pages
Route::get('/ads/v2/adgroups-product', [App\Http\Controllers\Groundtruth\V2AdgroupsController::class, 'ads_v2_adgroups_product'])->middleware('auth');
Route::get('/ads/v2/adgroups-behavioral-audience', [App\Http\Controllers\Groundtruth\V2AdgroupsController::class, 'ads_v2_adgroups_behavioral_audience'])->middleware('auth');
Route::get('/ads/v2/adgroups-category', [App\Http\Controllers\Groundtruth\V2AdgroupsController::class, 'ads_v2_adgroups_category'])->middleware('auth');
Route::get('/ads/v2/adgroups-brand-affinity', [App\Http\Controllers\Groundtruth\V2AdgroupsController::class, 'ads_v2_adgroups_brand_affinity'])->middleware('auth');
Route::get('/ads/v2/adgroups-sv-locations', [App\Http\Controllers\Groundtruth\V2AdgroupsController::class, 'ads_v2_adgroups_sv_locations'])->middleware('auth');
Route::get('/ads/v2/adgroups-publisher', [App\Http\Controllers\Groundtruth\V2AdgroupsController::class, 'ads_v2_adgroups_publisher'])->middleware('auth');

//Route for Groundtruth v2 Campaign fetch table data
Route::get('/get/v2/table-adgroups-product', [App\Http\Controllers\Groundtruth\V2AdgroupsController::class, 'fetch_ads_v2_adgroups_product'])->middleware('auth');
Route::get('/get/v2/table-adgroups-behavioral', [App\Http\Controllers\Groundtruth\V2AdgroupsController::class, 'fetch_ads_v2_adgroups_behavioral'])->middleware('auth');
Route::get('/get/v2/table-adgroups-category', [App\Http\Controllers\Groundtruth\V2AdgroupsController::class, 'fetch_ads_v2_adgroups_category'])->middleware('auth');
Route::get('/get/v2/table-adgroups-brand', [App\Http\Controllers\Groundtruth\V2AdgroupsController::class, 'fetch_ads_v2_adgroups_brand'])->middleware('auth');
Route::get('/get/v2/table-adgroups-publisher', [App\Http\Controllers\Groundtruth\V2AdgroupsController::class, 'fetch_ads_v2_adgroups_publisher'])->middleware('auth');

Route::get('/get/v2/table-adgroups-sv-locations', [App\Http\Controllers\Groundtruth\V2AdgroupsController::class, 'fetch_ads_v2_adgroups_sv_locations'])->middleware('auth');


Route::post('/fetch/userDate', [App\Http\Controllers\UserController::class, 'fetch_userDate']);


Route::get('/get/table-campaign-daily-view', [App\Http\Controllers\Groundtruth\CampaignController::class, 'fetch_ads_campaign_daily_chart'])->middleware('auth');
