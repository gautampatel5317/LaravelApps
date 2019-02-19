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

Route::get('/', function () {
		return view('welcome');
	});

Auth::routes();
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
		Route::get('/dashboard', 'HomeController@index')->name('home');
		Route::resource('services', 'Backend\Services\ServicesController', ['except' => ['show']]);
		Route::any('services/{service}/delete', 'Backend\Services\ServicesController@destroy')->name('services.delete');
		Route::any('services/subcategory', 'Backend\Services\ServicesController@getSubCategory')->name('services.subcategory');
	});
