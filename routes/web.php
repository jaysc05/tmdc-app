<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['middleware' => 'web'], function()
{
	// Admin Controller
	Route::get('/', 'Admin\AdminController@index')->name('admin')->middleware('admin');
	Route::get('/users', 'Admin\UserController@index')->name('user.index')->middleware('admin');

	// Employee Controller
	Route::get('/e', 'Employee\EmployeeController@index')->name('employee')->middleware('employee');
	Route::get('/e/attendance', 'Employee\AttendanceController@index')->name('attendance.index')->middleware('employee');
	Route::get('/e/attendance/punch', 'Employee\AttendanceController@create')->name('attendance.create')->middleware('employee');
	Route::post('/e/attendance/punch', 'Employee\AttendanceController@store')->name('attendance.store')->middleware('employee');
});