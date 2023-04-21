<?php

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

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserInfoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::resource('home', 'HomeController');
    Route::resource('news', 'NewsController');
    // Newsのリソースコントローラーの中身
    // Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    // Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    // Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    // Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');
    // Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    // Route::put('/news/{news}', [NewsController::class, 'update'])->name('news.update');
    // Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
    Route::resource('post', 'PostController');
    Route::resource('user_info', 'UserInfoController');
    Route::post('/ajaxlike', 'NewsController@ajaxlike');
    Route::post('/ajaxevent', 'NewsController@ajaxevent');
});

