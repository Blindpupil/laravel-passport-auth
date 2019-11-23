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

Route::group(['middleware' => ['user.token.request', 'auth:api']], function ()
{
    Route::get('user', function (Request $request)
    {
        return $request->user();
    });

    Route::get('logout', 'Auth\PersonalAccessTokenController@logout');
});

// AUTHENTICATION
Route::post('register', 'Users\UsersController@store');
Route::post('login', 'Auth\PersonalAccessTokenController@login');
