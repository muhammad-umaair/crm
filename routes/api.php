<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ArticlesController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::controller(FileController::class)->group(function () {

    Route::post('/uploader', 'upload');
    Route::get('/downloader', 'download');
});

Route::controller(ArticlesController::class)->group(function () {
    Route::get('/articles', 'index');
    Route::get('/articles/{id}', 'show');
    Route::post('/articles', 'store');
    Route::put('/articles/{id}', 'update');
    Route::delete('/articles/{id}', 'destroy');
});
