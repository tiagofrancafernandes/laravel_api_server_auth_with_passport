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

Route::prefix('auth')->group( function() {

    Route::post('register',     'AuthenticatorController@register');
    Route::post('login',        'AuthenticatorController@login');
    Route::get('register/activate/{id}/{token}',
            'AuthenticatorController@register_activate');

    Route::middleware('auth:api')->group( function () {
        Route::post('logout',        'AuthenticatorController@logout');
    });

});

Route::get('products',        'ProductsController@index')
    ->middleware('auth:api');

Route::get('users',        function(){//TODO Remove this [only dev]
    $users = [
        ['id' => 1, 'firstName' => "one", 'lastName' => "last one", 'token' => "one-fake-jwt-token", 'username' => "oneuser"],
        ['id' => 2, 'firstName' => "two", 'lastName' => "last two", 'token' => "two-fake-jwt-token", 'username' => "twouser"],
        ['id' => 3, 'firstName' => "three", 'lastName' => "last three", 'token' => "three-fake-jwt-token", 'username' => "threeuser"],
    ];

    return response()->json($users, 200);
});
