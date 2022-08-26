<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UpdateProfileController;

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

//This route is for dashboard of both user and admin page
Route::get('/', [App\Http\Controllers\Auth\AuthController::class, 'redirectTo'])->middleware('auth','PreventBackHistory');

// This middleware is to prevent users from using the back button in browser
Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});


// Route::get('/index/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard')->middleware('auth');
// Route::get('/index/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.dashboard')->middleware('auth');


// This route is for profile page
Route::controller(UpdateProfileController::class)->prefix('profile')->middleware('auth','PreventBackHistory')->group(function () {
    Route::get('/','index');
    Route::post('/update-user', 'update')->name('update-user');
    Route::post('/update-password', 'updatePassword')->name('update-password');
    Route::post('/update-picture','updatePicture')->name('PictureUpdate');

});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// This route is for logout of both admin and user
Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'logout'])->middleware('auth');

