<?php

use Illuminate\Http\Request;

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

Route::namespace('Api')->group(function(){
    
    Route::prefix('devedores')->group(function(){
        Route::get('/', 'DevedorController@index');
        Route::post('/', 'DevedorController@store');
        Route::get('/{id}', 'DevedorController@show');  
        Route::put('/{id}', 'DevedorController@update');  
        Route::delete('/{id}', 'DevedorController@delete');
    });

    Route::prefix('dividas')->group(function(){
        Route::post('/', 'DividaController@store');
        Route::get('/{id}', 'DividaController@list');
    });
    
    Route::get('find', 'DevedorController@find');
});