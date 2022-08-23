<?php

use Illuminate\Support\Facades\Route;

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
    $id = Auth::id();
    if ($id == 1 ) {
        return view('backend.dashboard');
    } else {
        return view('frontend.dashboard');
    }
})->middleware('auth');

Auth::routes();

Route::get('/index/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin-dashboard')->middleware('auth');
Route::get('/index/user', [App\Http\Controllers\UserController::class, 'index'])->name('user-dashboard')->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'logout'])->middleware('auth');
Route::get('/profile', [App\Http\Controllers\UpdateProfileController::class, 'index'])->middleware('auth');

Route::post('/profile/update-user', [App\Http\Controllers\UpdateProfileController::class, 'update'])->name('update-user')->middleware('auth');
Route::post('/profile/update-password', [App\Http\Controllers\UpdateProfileController::class, 'updatePassword'])->name('update-password')->middleware('auth');
Route::post('/profile/update-picture', [App\Http\Controllers\UpdateProfileController::class,'updatePicture'])->name('PictureUpdate')->middleware('auth');


// Route::get('/profile', function () {
//     return view('profile.profile');
// })->middleware('auth');

