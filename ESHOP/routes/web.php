<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [FrontendController::class, 'index']);
Route::get('/category', [FrontendController::class, 'category']);
Route::get('/category/{slug}', [FrontendController::class, 'viewcategory']);
Route::get('/category/{cate_slug}/{prod_slug}', [FrontendController::class, 'productview']);

Auth::routes();

Route::post('/addToCart', [CartController::class, 'addProduct']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [CategoryController::class, 'index']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('add-category', [CategoryController::class, 'add']);
    Route::post('insert-category', [CategoryController::class, 'insert']);
    Route::get('edit-catagory/{id}', [CategoryController::class, 'edit']);
    Route::PUT('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);
    Route::get('products', [ProductController::class, 'index']);
    Route::get('add-products', [ProductController::class, 'add']);
    Route::post('insert-product', [ProductController::class, 'insert']);
    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::get('delete-category/{id}', [ProductController::class, 'destroy']);
});

// route::get('/coba', function () {
//     return view('admin.index');
// });
