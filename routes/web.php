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
Route::get('/', 'HomeController@index')->name('welcome');
Route::resource('user','UserController');
Route::resource('indicator','IndicatorController');
Route::resource('project','ProjectController');
Route::get('/project/edit/{id}', 'ProjectController@edit');
Route::resource('member','MemberController');
Route::resource('projectindicator','ProjectIndicatorController');
Route::get('/project/indicator/{id}', 'ProjectIndicatorController@index');
Route::get('/project/indicator/new/{id}', 'ProjectIndicatorController@create');
Route::resource('projectmember','ProjectMemberController');
Route::get('/project/member/{id}', 'ProjectMemberController@index');
Route::resource('statuschange','StatusChangeController');
Route::resource('progress','ProgressController');
Route::resource('indicatorvalue','IndicatorValueController');
Route::get('generate-pdf/{id}','IndicatorController@generatePDF');
Route::get('report/{id}','IndicatorController@report');
Route::get('reports','IndicatorController@reportindex');
Route::get('cancelemail', 'EmailController@sendcancellations');
Route::resource('permission','PermissionController');
Route::get('/permission/edit/{id}', 'PermissionController@edit');