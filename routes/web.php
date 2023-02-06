<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OurClientController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MetaController;
use App\Http\Controllers\OurWorkController;
use App\Http\Controllers\WebSiteController;

/*--------------------------------- Website Routes ---------------------------------*/

Route::get('/',[WebSiteController::class, 'viewIndex']);
Route::get('/blog', [WebSiteController::class, 'viewBlog']);
Route::get('/our-work', [WebSiteController::class, 'viewOurWork']);


Route::get('/about-us',[WebSiteController::class, 'viewAbout']);

Route::get('/getin-touch',[WebSiteController::class, 'viewGetintouch']);

Route::get('/our-clients', [WebSiteController::class, 'viewOurClients']);

/*--------------------------------- Auth Routes ---------------------------------*/

Route::get('/admin/login', [AuthController::class, 'index'])->name('login.view')->middleware('guest');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login')->middleware('guest');

/*--------------------------------- Admin Routes ---------------------------------*/

Route::group(['middleware' => 'auth','prefix'=>'/admin'], function () {

    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    /*-------------------------------

     ______________
    |  Resources  |
    ______________
        1: Our Clients
        2: Category
        3: blogs
        4: Our Works
    --------------------------------*/

    Route::resources([
        '/our-clients' => OurClientController::class,
        '/category' => CategoryController::class,
        '/blog' => BlogController::class,
        '/our-works' => OurWorkController::class
    ]);

    /*--------------------------------- File Manager ---------------------------------*/

    Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
    
    /*--------------------------------- Our News ---------------------------------*/

    Route::get('/news', [NewsController::class,'index'])->name('news.index');
    Route::get('/news/create', [NewsController::class,'create'])->name('news.create');
    Route::post('/news', [NewsController::class,'store'])->name('news.store');
    Route::get('/news/{blog}', [NewsController::class,'edit'])->name('news.edit');
    Route::put('/news/{blog}', [NewsController::class,'update'])->name('news.update');
    Route::delete('/news/{blog}', [NewsController::class,'destroy'])->name('news.destroy');
 
    /*----------------------------------- Meta ---------------------------------*/

    Route::get('/meta', [MetaController::class, 'index'])->name('meta.index');
    Route::get('/meta{meta}', [MetaController::class, 'edit'])->name('meta.edit');
    Route::put('meta/{meta}', [MetaController::class, 'update'])->name('meta.update');

});


