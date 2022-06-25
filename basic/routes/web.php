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

// Route::get('/', function () {
//     return view("welcome");
// });

// Route::get('/about', function () {
//     return view("about");
// });

// Route::get('/contact', function () {
//     return view("contact");
// });

Route::get('/', 'App\Http\Controllers\HomeController@home');
Route::get('/books/add', 'App\Http\Controllers\HomeController@createUser');
Route::post('/store', 'App\Http\Controllers\HomeController@saveUser');
Route::get('/edit/{id}', 'App\Http\Controllers\HomeController@editUser');
Route::post('/update/{id}', 'App\Http\Controllers\HomeController@updateUser');
Route::get('/delete/{id}', 'App\Http\Controllers\HomeController@deleteUser');
Route::get('/about', 'App\Http\Controllers\HomeController@about');
Route::get('/contact', 'App\Http\Controllers\HomeController@contact');
Route::get('/search', 'App\Http\Controllers\HomeController@searchData');

// Route::get('/coba', 'HomeController@coba');

// Route::get('/', App\Http\Controllers\HomeController::class);
