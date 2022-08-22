<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'api\AuthController@login');
    Route::post('logout', 'api\AuthController@logout');
    Route::post('refresh', 'api\AuthController@refresh'); 
    Route::post('me', 'api\AuthController@me');

});

Route::group([
    'middleware' => 'jwt.auth',
    'prefix' => 'admin'
], function ($router) {
    Route::get('users', 'api\UserController@index');
    Route::get('users/data', 'api\UserController@data');
    Route::post('users/store', 'api\UserController@store');
    Route::post('users/update', 'api\UserController@update');
});

Route::group([
    'middleware' => 'jwt.auth',
    'prefix' => 'order'
], function ($router) {
    Route::get('/orders','api\Gestion\OrderController@index'); 
});

Route::get('products','api\Gestion\ProductController@index');
Route::post('/sendOrder','api\Gestion\OrderController@sendOrder'); 