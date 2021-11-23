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

Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/chart', 'DashboardController@chart');

    Route::get('/logout', 'AuthController@logout');

    Route::get('/user', 'UserController@user');
    Route::put('/user/info', 'UserController@updateInfo');
    Route::put('/user/password', 'UserController@updatePassword');

    Route::post('/upload', 'ImageController@upload');

    Route::get('/export', 'OrderController@export');

    Route::apiResource('/orders', 'OrderController')->only('index', 'show');
    Route::apiResource('/permissions', 'PermissionController')->only('index');
    Route::apiResource('/products', 'ProductController');
    Route::apiResource('/roles', 'RoleController');
    Route::apiResource('/users', 'UserController');
});
