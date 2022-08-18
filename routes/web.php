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
    return view('portal.dashboard');
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'logout']);
Route::get('/profile', [App\Http\Controllers\UpdateProfileController::class, 'index'])->middleware('auth');

Route::post('/profile/update-user', [App\Http\Controllers\UpdateProfileController::class, 'update'])->name('update-user');
Route::post('/profile/update-password', [App\Http\Controllers\UpdateProfileController::class, 'updatePassword'])->name('update-password');



// Route::get('/profile', function () {
//     return view('profile.profile');
// })->middleware('auth');

