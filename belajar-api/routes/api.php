<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('all-api', [TestApiController::class, 'index']);
Route::get('get-blog/{id?}', [BlogController::class, 'getBlog']);
Route::post('add-api', [BlogController::class, 'addPost']);
Route::put('update-blog', [BlogController::class, 'updateBlog']);
Route::delete('delete-blog/{id}', [BlogController::class, 'deleteBlog']);
Route::get('cari-data/{param}', [BlogController::class, 'searchBlog']);

Route::post('/valid-post', [BlogController::class, 'validateData']);
Route::post('/upload', [FileUpload::class, 'uploadFile']);

Route::apiResource('/post', PostController::class);







