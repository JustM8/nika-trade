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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/locale/{lang}', [\App\Http\Controllers\LanguageController::class,'index'])->name('index');


Auth::routes(['register' => false]);

Route::get('/',[App\Http\Controllers\MainController::class,'index'])->name('main');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::resource('news', \App\Http\Controllers\NewsController::class);
Route::get('news',[App\Http\Controllers\NewsController::class,'index']);
Route::get('/news/{slug}',[App\Http\Controllers\NewsController::class,'show']);

Route::name('admin.')->prefix('admin')->middleware(['auth','admin'])->group(function (){
    Route::get('dashboard', \App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');

    Route::resource('products',\App\Http\Controllers\Admin\ProductsController::class)->except(['show']);
    Route::resource('news',\App\Http\Controllers\Admin\NewsController::class)->except(['show']);
//    Route::resource('categories',\App\Http\Controllers\Admin\CategoriesController::class)->except(['show']);
});
