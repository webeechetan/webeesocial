<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OurClientController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\OurWorkController;
use App\Models\News;
use App\Models\Blog;

Route::get('/{blog:slug}', function (Blog $blog) {
    dd($blog);
    return view('admin.layouts.app');
});

/*--------------------------------- Auth Routes ---------------------------------*/

Route::get('/admin/login', [AuthController::class, 'index'])->name('login.view')->middleware('guest');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login')->middleware('guest');


Route::group(['middleware' => 'auth','prefix'=>'/admin'], function () {

    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    /*--------------------------------- File Manager ---------------------------------*/

    Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

    /*--------------------------------- Our Clients ---------------------------------*/

    Route::resource('/our-clients', OurClientController::class);


    
    /*--------------------------------- Our News ---------------------------------*/

    Route::get('/news', [NewsController::class,'index'])->name('news.index');
    Route::get('/news/create', [NewsController::class,'create'])->name('news.create');
    Route::post('/news', [NewsController::class,'store'])->name('news.store');
    Route::get('/news/{blog}', [NewsController::class,'edit'])->name('news.edit');
    Route::put('/news/{blog}', [NewsController::class,'update'])->name('news.update');
    Route::delete('/news/{blog}', [NewsController::class,'destroy'])->name('news.destroy');

    /*--------------------------------- Category ---------------------------------*/

    Route::resource('/category', CategoryController::class);


    /*--------------------------------- Blog ---------------------------------*/

    Route::resource('/blog', BlogController::class);

    
    /*--------------------------------- Our Work ---------------------------------*/

    Route::resource('/our-works', OurWorkController::class);

});


