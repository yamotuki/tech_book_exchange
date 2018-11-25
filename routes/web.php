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

Route::namespace('Offer')->group(function() {
    Route::get('/add', 'AddController@showAddForm')->name('offer.add');
    Route::post('/add', 'AddController@add');
});
