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
Route::group(['middleware' => 'auth', 'middleware' => 'verified'], function () {
Route::get('/', function () {
    return view('pages.index');
});

Route::resource('vehicle', 'VehiclesController');
Route::get('/vehicle/{id}/notifyOwner', 'VehiclesController@notifyOwner');
Route::get('/vehicle/{id}/hide', 'VehiclesController@hide');
Route::get('/rentSummary', 'PagesController@rentSummary');
Route::get('/updateVehicleStatus/{vehicle}', 'VehiclesController@updateStatus');
Route::get('/smartSearch', 'LiveSearchController@index');
Route::get('/smartSearch/action', 'LiveSearchController@action')->name('live_search.action');

});

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/leasev', 'PagesController@lease');
Route::get('/signup', 'PagesController@signup');
Route::get('/login', 'PagesController@login');
Route::get('/team', 'PagesController@team');
Route::get('/bookingTime', 'PagesController@bookingTime');

Auth::routes(['verify' => true]);

Route::get('/myvehicles', 'HomeController@index')->name('myvehicles');
