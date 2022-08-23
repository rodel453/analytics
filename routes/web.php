<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

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

Route::get('/', function () {
    $utype = Auth::user()->user_type;
    if ($utype == 1 ) {
        $usercount = User::all()->count();
        return view('backend.dashboard',compact('usercount'));
    } else {
        return view('frontend.dashboard');
    }
})->middleware('auth');

Auth::routes();

Route::get('/index/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin-dashboard')->middleware('auth');
Route::get('/index/user', [App\Http\Controllers\UserController::class, 'index'])->name('user-dashboard')->middleware('auth');


// This route is for profile page
Route::prefix('profile')->group(function () {
    Route::get('/', [App\Http\Controllers\UpdateProfileController::class, 'index'])->middleware('auth');
    Route::post('/update-user', [App\Http\Controllers\UpdateProfileController::class, 'update'])->name('update-user')->middleware('auth');
    Route::post('/update-password', [App\Http\Controllers\UpdateProfileController::class, 'updatePassword'])->name('update-password')->middleware('auth');
    Route::post('/update-picture', [App\Http\Controllers\UpdateProfileController::class,'updatePicture'])->name('PictureUpdate')->middleware('auth');

});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'logout'])->middleware('auth');

