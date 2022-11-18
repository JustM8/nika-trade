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
