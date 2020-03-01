<?php

    Route::get('/', function () {
        return view('landingPage.index');
    });

    Auth::routes();

    Route::get('/promotion', function(){
        return view('landingPage.promotion');
    });

    Route::get('/aboutus', function(){
        return view('landingPage.aboutus');
    });

    Route::get('/drinks/display', 'DrinksController@index')->middleware('can:manage-drinks');
    Route::get('/drinks/display/approved', 'DrinksController@approved')->middleware('can:manage-drinks');
    Route::get('/drinks/display/pending', 'DrinksController@pending')->middleware('can:manage-drinks');
    Route::get('/drinks/display/notapproved', 'DrinksController@notapproved')->middleware('can:manage-drinks');
    Route::get('/drinks/search', 'DrinksController@search')->middleware('can:manage-drinks');
    Route::post('/drinks/store','DrinksController@store')->middleware('can:manage-drinks');
    Route::get('/drinks/delete/{id}', 'DrinksController@destroy')->middleware('can:delete-drinks');
    Route::get('/drinks/edit/{id}', 'DrinksController@edit')->middleware('can:edit-drinks');
    Route::put('/drinks/update/{id}', 'DrinksController@update')->middleware('can:edit-drinks');

    Route::get('/promotion/display', 'PromotionsController@index')->middleware('can:manage-promotions');
    Route::get('/promotion/display/approved', 'PromotionsController@approved')->middleware('can:manage-promotions');
    Route::get('/promotion/display/pending', 'PromotionsController@pending')->middleware('can:manage-promotions');
    Route::get('/promotion/display/notapproved', 'PromotionsController@notapproved')->middleware('can:manage-promotions');
    Route::get('/promotion/search', 'PromotionsController@search')->middleware('can:manage-promotions');
    Route::post('/promotion/store','PromotionsController@store')->middleware('can:manage-promotions');
    Route::get('/promotion/delete/{id}', 'PromotionsController@destroy')->middleware('can:delete-promotions');
    Route::get('/promotion/edit/{id}', 'PromotionsController@edit')->middleware('can:edit-promotions');
    Route::put('/promotion/update/{id}', 'PromotionsController@update')->middleware('can:edit-promotions');

    Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
        Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store', 'destory']]);
    });

    Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
        Route::get('/users/search', 'UsersController@search');
        Route::get('/users/delete/{id}', 'UsersController@destroy');
    });