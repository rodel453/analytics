<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UpdateProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
// use Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('test', function(){
    return "This routes is working";
});


// Route for userTable in Admin
Route::get('users/delete/{id}', [App\Http\Controllers\AdminController::class, 'delete'])->middleware('auth');
Route::get('users/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->middleware('auth');
Route::post('users/update/', [App\Http\Controllers\AdminController::class, 'update'])->middleware('auth');
Route::get('users', [App\Http\Controllers\AdminController::class, 'user_data'])->middleware('auth');

// Route for websiteTable in Admin
Route::get('website', [App\Http\Controllers\AdminController::class, 'website_data'])->middleware('auth');
Route::get('campaign', [App\Http\Controllers\AdminController::class, 'campaign'])->middleware('auth');
Route::get('website/status-update/{id}/{status}', [App\Http\Controllers\AdminController::class, 'status_update'])->middleware('auth');

//This route is for dashboard of both user and admin page
Route::get('/', [App\Http\Controllers\Auth\AuthController::class, 'redirectTo'])->middleware('auth','PreventBackHistory');

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
Route::post('/mark-as-read', [App\Http\Controllers\HomeController::class, 'markNotification'])->name('markNotification')->middleware('auth','PreventBackHistory');

// This route is for logout of both admin and user
Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'logout'])->middleware('auth');

