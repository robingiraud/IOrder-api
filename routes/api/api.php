<?php

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

Route::get('/test', 'App\Http\Controllers\Api\AuthController@test');

Route::middleware('auth:api')->get('/user', function (Request $request) { return $request->user(); });


// Users authentication
Route::prefix('/auth')->group(function () {
    Route::post('/login', 'App\Http\Controllers\Api\AuthController@login');
    Route::post('/register', 'App\Http\Controllers\Api\AuthController@register');
    Route::middleware('auth:api')->get('/user', 'App\Http\Controllers\Api\AuthController@user');
    Route::middleware('auth:api')->get('/logout', 'App\Http\Controllers\Api\AuthController@logout');
});
