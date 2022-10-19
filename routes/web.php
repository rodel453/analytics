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
// Route::get('get/top-country', [App\Http\Controllers\Auth\AuthController::class, 'top_country'])->middleware('auth');

//Route for Google ads
Route::get('/campaign/overview', [App\Http\Controllers\Campaign\OverviewController::class, 'index'])->middleware('auth');