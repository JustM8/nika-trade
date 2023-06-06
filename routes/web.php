<?php

use Illuminate\Support\Facades\Auth;
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

Route::delete(
    'ajax/images/{image}',
        \App\Http\Controllers\Ajax\RemoveImageController::class
)->middleware(['auth','admin'])->name('ajax.images.delete');


//Route::resource('news', \App\Http\Controllers\NewsController::class);
Route::get('news',[App\Http\Controllers\NewsController::class,'index']);
Route::get('/news/{slug}',[App\Http\Controllers\NewsController::class,'show']);

//categories index
Route::get('categories', [\App\Http\Controllers\CategoriesController::class, 'index'])->name('categories.index');

//categories show
Route::get('categories/{params?}', [\App\Http\Controllers\CategoriesController::class, 'show'])->name('categories.show')
    ->where('params', '(.*)');

Route::name('admin.')->prefix('admin')->middleware(['auth','admin'])->group(function (){
    Route::get('dashboard', \App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');

    Route::resource('categories',\App\Http\Controllers\Admin\CategoriesController::class)->except(['show']);
    Route::resource('products',\App\Http\Controllers\Admin\ProductsController::class)->except(['show']);

    Route::resource('news',\App\Http\Controllers\Admin\NewsController::class)->except(['show']);
});


//pages

//Route::get('/services', [App\Http\Controllers\PagesController::class, 'index'])->name('services');
Route::get('/{slug}', [\App\Http\Controllers\PagesController::class,'show'])->name('services');
