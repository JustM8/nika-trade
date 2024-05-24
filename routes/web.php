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
Auth::routes();

Route::get('/',[App\Http\Controllers\MainController::class,'index'])->name('main');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::delete(
    'ajax/images/{image}',
        \App\Http\Controllers\Ajax\RemoveImageController::class
)->middleware(['auth','admin'])->name('ajax.images.delete');

Route::get('/load-more-news', [App\Http\Controllers\NewsController::class,'loadMoreNews'])->name('load-more-news');
Route::get('news',[App\Http\Controllers\NewsController::class,'index']);
Route::get('/news/{slug}',[App\Http\Controllers\NewsController::class,'show'])->name('news.show');

Route::get('cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post('cart/{product}', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::delete('cart', [\App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::post('cart/{product}/count', [\App\Http\Controllers\CartController::class, 'countUpdate'])->name('cart.count.update');

Route::delete('ajax/cart', [\App\Http\Controllers\Ajax\CartController::class, 'remove'])->name('ajax.cart.remove');
Route::get('ajax/cart/popup', [\App\Http\Controllers\Ajax\CartController::class, 'getCardPopup'])->name('cart.popup');
Route::post('ajax/cart/{product}', [\App\Http\Controllers\Ajax\CartController::class, 'add'])->name('cart.add');
Route::post('ajax/cart/{product}/count', [\App\Http\Controllers\Ajax\CartController::class, 'countUpdate'])->name('ajax.cart.count.update');
//виніс оформлення  за умову авторизації, вона тут не треба, тільки реєстрація юезар та його ID для замовлення
Route::get('checkout', \App\Http\Controllers\CheckoutController::class)->name('checkout');
Route::post('order', [\App\Http\Controllers\OrdersController::class,'index'])->name('orders');
Route::post('order/create', [\App\Http\Controllers\OrdersController::class,'create'])->name('order.create');
Route::get('order/{orderId}/thankyou',[\App\Http\Controllers\OrdersController::class,'thankYou'])->name('thankYou');

Route::middleware('auth')->group(function() {


    Route::name('account.')->prefix('account')->group(function (){
        Route::get('/',[\App\Http\Controllers\Account\UsersController::class,'index'])->name('index');
        Route::get('orders',[\App\Http\Controllers\Account\UsersController::class,'orders'])->name('orders');
        Route::get('orders/{order?}',[\App\Http\Controllers\Account\UsersController::class,'show'])
            ->middleware('can:show,order')
            ->name('orders.show');

        Route::get('{user}/edit',[\App\Http\Controllers\Account\UsersController::class,'edit'])
            ->middleware('can:view,user')
            ->name('edit');
        Route::put('{user}',[\App\Http\Controllers\Account\UsersController::class,'update'])
            ->middleware('can:update,user')
            ->name('update');
    });

});

//categories index
Route::get('categories', [\App\Http\Controllers\CategoriesController::class, 'index'])->name('categories.index');

//categories show
Route::get('categories/{params?}', [\App\Http\Controllers\CategoriesController::class, 'show'])->name('categories.show')
    ->where('params', '(.*)');

//product
//Route::resource('products', \App\Http\Controllers\ProductsController::class)->only(['show','index']);

Route::name('admin.')->prefix('admin')->middleware(['auth','admin'])->group(function (){
    Route::get('dashboard', \App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');

    Route::resource('orders',\App\Http\Controllers\Admin\OrdersController::class)->except(['edit','update','destroy']);

    Route::resource('categories',\App\Http\Controllers\Admin\CategoriesController::class)->except(['show']);
    Route::resource('products',\App\Http\Controllers\Admin\ProductsController::class)->except(['show']);

    Route::resource('news',\App\Http\Controllers\Admin\NewsController::class)->except(['show']);
    Route::resource('galleries',\App\Http\Controllers\Admin\GalleriesController::class)->except(['show']);
    Route::resource('services',\App\Http\Controllers\Admin\ServicesController::class)->except(['show']);
    Route::resource('main',\App\Http\Controllers\Admin\MainPageController::class)->except(['show','edit','update','destroy']);
    Route::get('/main/{mainPage}/edit',[App\Http\Controllers\Admin\MainPageController::class,'edit'])->name('main.edit');
    Route::put('/main/{mainPage}',[App\Http\Controllers\Admin\MainPageController::class,'update'])->name('main.update');
    Route::delete('/main/{mainPage}',[App\Http\Controllers\Admin\MainPageController::class,'destroy'])->name('main.destroy');
});

//catalog
Route::get('catalog', [\App\Http\Controllers\CatalogController::class, 'index'])->name('catalog.index');
Route::get('catalog/{slug}', [\App\Http\Controllers\CatalogController::class, 'show'])->name('catalog.show');
Route::get('product/{product:slug}',[App\Http\Controllers\ProductsController::class,'show'])->name('product.show');
//Route::get('product/{slug}', [\App\Http\Controllers\ProductsController::class, 'show'])->name('product.show');

//pages
Route::get('/{slug}', [\App\Http\Controllers\PagesController::class,'show'])->name('services');
Route::get('/category-with-galleries/{id}', [\App\Http\Controllers\PagesController::class, 'getCategoryWithGalleries']);
