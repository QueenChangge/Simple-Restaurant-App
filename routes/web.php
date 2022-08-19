<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return view('welcome');
});

//Route::get('/category/create', ['\App\Http\Controllers\CategoryController::class', 'create']);
//Route::get('/category/create', '\App\Http\Controllers\CategoryController@create');
Route::resource('category', '\App\Http\Controllers\CategoryController')->middleware('auth');

Route::resource('food', '\App\Http\Controllers\FoodController')->middleware('auth');
//Route::post('/food/create', ['\App\Http\Controllers\FoodController::class', 'create']);









Auth::routes(['register'=>false]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
