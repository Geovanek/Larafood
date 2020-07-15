<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->namespace('Admin')->group(function() {

    Route::post('plans/{url}/details/store', 'DetailPlanController@store')->name('details.plan.store');
    Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
    Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');

    Route::put('plans/{id}', 'PlanController@update')->name('plans.update');
    Route::get('plans/{id}/edit', 'PlanController@edit')->name('plans.edit');
    Route::post('plans', 'PlanController@store')->name('plans.store');
    Route::get('plans/create', 'PlanController@create')->name('plans.create');
    Route::get('plans', 'PlanController@index')->name('plans.index');
    Route::delete('plans/{id}', 'PlanController@destroy')->name('plans.destroy');
    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    Route::get('plans/{url}', 'PlanController@show')->name('plans.show');

    Route::get('/', 'PlanController@index')->name('admin.index');
});

Route::get('/', function () {
    return view('welcome');
});
