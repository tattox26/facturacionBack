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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('factura')->group(function () {
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@authenticate'); 
    Route::get('readInovice', 'FacturaController@index');
    Route::post('storeInovice', 'FacturaController@store');
    Route::get('getInvoice/{id}', 'FacturaController@getInvoice');
    Route::get('read', 'itemController@index');
   
    Route::post('store', 'itemController@store');
});


Route::group(['middleware' => ['jwt.verify']], function() {
    Route::prefix('factura')->group(function () {
        Route::get('user', 'UserController@getAuthenticatedUser');
        
        Route::put('update/{id}', 'itemController@update');
        Route::delete('delete/{id}', 'itemController@destroy');
        Route::get('get/{id}', 'itemController@get'); 
       
        
    });
});