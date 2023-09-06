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
Route::get('/news/{slug}',[App\Http\Controllers\NewsController::class,'show'])->name('news.show');

Route::get('cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post('cart/{product}', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::delete('cart', [\App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::post('cart/{product}/count', [\App\Http\Controllers\CartController::class, 'countUpdate'])->name('cart.count.update');

Route::middleware('auth')->group(function() {
    Route::get('checkout', \App\Http\Controllers\CheckoutController::class)->name('checkout');
    Route::post('order', [\App\Http\Controllers\OrdersController::class,'index'])->name('orders');
    Route::post('order/create', [\App\Http\Controllers\OrdersController::class,'create'])->name('order.create');
    Route::get('order/{orderId}/thankyou',[\App\Http\Controllers\OrdersController::class,'thankYou'])->name('thankYou');
});

//categories index
Route::get('categories', [\App\Http\Controllers\CategoriesController::class, 'index'])->name('categories.index');

//categories show
Route::get('categories/{params?}', [\App\Http\Controllers\CategoriesController::class, 'show'])->name('categories.show')
    ->where('params', '(.*)');

//product
Route::get('products/{product:slug}',[App\Http\Controllers\ProductsController::class,'show'])->name('products.show');
//Route::resource('products', \App\Http\Controllers\ProductsController::class)->only(['show','index']);

Route::name('admin.')->prefix('admin')->middleware(['auth','admin'])->group(function (){
    Route::get('dashboard', \App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');

    Route::resource('categories',\App\Http\Controllers\Admin\CategoriesController::class)->except(['show']);
    Route::resource('products',\App\Http\Controllers\Admin\ProductsController::class)->except(['show']);

    Route::resource('news',\App\Http\Controllers\Admin\NewsController::class)->except(['show']);
});


Route::get('catalog', [\App\Http\Controllers\CatalogController::class, 'index'])->name('catalog.index');
Route::get('catalog/{slug}', [\App\Http\Controllers\CatalogController::class, 'show'])->name('catalog.show');
Route::get('product/{slug}', [\App\Http\Controllers\ProductsController::class, 'show'])->name('product.show');

//pages

//Route::get('/services', [App\Http\Controllers\PagesController::class, 'index'])->name('services');
Route::get('/{slug}', [\App\Http\Controllers\PagesController::class,'show'])->name('services');
