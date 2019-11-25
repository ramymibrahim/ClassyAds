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

Route::get('/', 'PageController@index');
Route::get('/items/{id}', 'ItemController@show');
Route::post('items/rate','ItemController@rate');
Route::group(['middleware' => 'auth','prefix'=>'admin'], function () {
    // Route::get('categories', 'CategoryController@index');
    // Route::get('categories/create', 'CategoryController@create');
    // Route::post('categories', 'CategoryController@store');
    // Route::get('categories/{id}/edit', 'CategoryController@edit');
    // Route::put('categories/{id}', 'CategoryController@update');
    // Route::delete('categories/{id}', 'CategoryController@destroy');


    Route::resource('locations','LocationController')->middleware('can:admin');
    Route::resource('categories','CategoryController')->middleware('can:manage');    
    Route::resource('items','ItemController')->middleware('can:subManage');  
    Route::get('/','PageController@admin')->middleware('can:subManage');
});

Auth::routes();

Route::get('lang/{lang}','PageController@setLang');
Route::get('/contact','PageController@contact');
Route::post('/contact','PageController@sendContact');