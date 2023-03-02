<?php

Route::get('/', function (){
    return 'welcome';
});

Auth::routes(['verify' => true]);

Route::get('/logout', function(){
    \Illuminate\Support\Facades\Auth::logout();
    return view('auth/login');
});


Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/dashboard', function (){
   return 'dashboard';
});

Route::get('/redirect/{service}','SocialController@redirect');

Route::get('/callback/{service}','SocialController@callback');

Route::get('fillable','CrudController@getOffers');


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function (){

    Route::group(['prefix' => 'offers'],function (){
            Route::get('create', 'CrudController@create');
            Route::post('store', 'CrudController@store')->name('offers.store');
    });

});
