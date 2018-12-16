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

Route::namespace('Baton')->group(function() {
    Route::get('/', 'IndexController@getList')->name('baton.list');

    Route::get('/add', 'AddController@showAddForm')->name('baton.add');
    Route::post('/add', 'AddController@add');
});


/*Route::get('/', array('as' => 'login', 'uses' => function(){
    return view('welcome');
}));*/
Route::get('/auth/twitter', 'Auth\SocialAuthController@redirectToProvider')
    ->name('auth.twitter');
Route::get('/auth/twitter/callback', 'Auth\SocialAuthController@handleProviderCallback');
Route::get('/auth/twitter/logout', 'Auth\SocialAuthController@logout')
    ->name('auth.twitter.logout');
/*Route::get('home', array('as' => 'home', 'uses' => function(){
    if(!Auth::check()){
        return redirect()->route("login");
    }
    return view('home');
}));*/