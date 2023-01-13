<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OurClientController;

Route::get('/', function () {
    return view('admin.layouts.app');
});

/*--------------------------------- Auth Routes ---------------------------------*/

Route::get('/admin/login', [AuthController::class, 'index'])->name('login.view')->middleware('guest');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login')->middleware('guest');


Route::group(['middleware' => 'auth','prefix'=>'/admin'], function () {

    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    /*--------------------------------- Our Clients ---------------------------------*/

    Route::resource('/our-clients', OurClientController::class);

});


