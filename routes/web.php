<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->namespace('Admin')
                      ->middleware('auth')
                      ->group(function() {

    /**
     * Route Categories
     */
    Route::any('products/search', 'ProductController@search')->name('products.search');
    Route::resource('products', 'ProductController');

    /**
     * Route Categories
     */
    Route::any('categories/search', 'CategoryController@search')->name('categories.search');
    Route::resource('categories', 'CategoryController');

    /**
     * Route Users
     */
    Route::any('users/search', 'UserController@search')->name('users.search');
    Route::resource('users', 'UserController');

    /**
     * Plan x Profiles
     */
    Route::get('plans/{id}/profiles/{idProfile}/detach', 'ACL\PlanProfileController@detachProfilePlan')->name('plans.profiles.detach');
    Route::post('plans/{id}/profiles', 'ACL\PlanProfileController@attachProfilesPlan')->name('plans.profiles.attach');
    Route::any('plans/{id}/profiles/available', 'ACL\PlanProfileController@profilesAvailable')->name('plans.profiles.available');
    Route::get('plans/{id}/profile', 'ACL\PlanProfileController@profiles')->name('plans.profiles');
    Route::get('profiles/{id}/plans', 'ACL\PlanProfileController@plans')->name('profiles.plans');

    /**
     * Permission x Profiles
     */
    Route::get('profiles/{id}/permissions/{idPermission}/detach', 'ACL\PermissionProfileController@detachPermissionProfile')->name('profiles.permissions.detach');
    Route::post('profiles/{id}/permissions', 'ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
    Route::any('profiles/{id}/permissions/available', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
    Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@permissions')->name('profiles.permissions');
    Route::get('permissions/{id}/profiles', 'ACL\PermissionProfileController@profiles')->name('permission.profiles');

    /**
     * Route Permissions
     */
    Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
    Route::resource('permissions', 'ACL\PermissionController');

    /**
     * Route Profiles
     */
    Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
    Route::resource('profiles', 'ACL\ProfileController');

     /**
      * Route Details Plan
      */

    Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
    Route::put('plans/{url}/details/{idDetail}', 'DetailPlanController@update')->name('details.plan.update');
    Route::get('plans/{url}/details/{idDetail}', 'DetailPlanController@show')->name('details.plan.show');
    Route::delete('plans/{url}/details/{idDetail}', 'DetailPlanController@destroy')->name('details.plan.destroy');
    Route::get('plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
    Route::post('plans/{url}/details/store', 'DetailPlanController@store')->name('details.plan.store');
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

/**
 * Site
 */
Route::namespace('Site')->group(function() {

  Route::get('/plan/{url}', 'SiteController@plan')->name('plan.subscription');
  Route::get('/', 'SiteController@index')->name('site.home');
});

/**
 * Auth Routes
 */
Auth::routes();
