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

// Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
// 	Route::resource('/users', 'UserController', ['except' => ['show', 'create', 'store']]);
// });

Route::group(['prefix' => '/admin',  'middleware' => 'admin'], function()
{
    Route::resource('/users', 'Admin\UserController', ['except' => ['show', 'create', 'store']]);
});