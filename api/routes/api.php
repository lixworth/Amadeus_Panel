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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::any('/ping', function () {
    return response()->json(\App\Http\Controllers\Controller::respondJson(true,'PONG'));
});

Route::group([
    'prefix' => 'auth',
], function ($router) {

    Route::any('login', 'AuthController@login');
    Route::any('checkuser', 'AuthController@checkUser');
    Route::any('logout', 'AuthController@logout');
    Route::any('refresh', 'AuthController@refresh');
    Route::any('me', 'AuthController@me');

});