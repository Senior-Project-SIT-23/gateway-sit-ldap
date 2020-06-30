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


Route::post('/login', 'LDAPController@attemptLogin');
Route::get('/oauth/token', 'AuthController@getTokenByAuthCode');

Route::group(['middleware' => ['checkAuth']], function () {
    Route::get('/login/auth-code', 'AuthController@getAuthCodeByUserId');
    Route::get('/users/{user_id}', 'AuthController@getUserByToken');
});
