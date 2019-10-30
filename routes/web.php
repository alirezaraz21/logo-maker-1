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

Route::get('/', 'LogoMakerController@home')->name('/');
Route::get('/getIcons', 'LogoMakerController@searchIcons')->name('/getIcons');
Route::get('/saveImage', 'LogoMakerController@saveImage')->name('/saveImage');




Route::group(['prefix' => '/api/'], function () {
	Route::post('/search/logos', 'LogoMakerController@searchApi')->name('search-logos');
});