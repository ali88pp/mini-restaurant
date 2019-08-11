<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group([ 'middleware' => 'auth:api'], function() {
    Route::get('permission', 'PermissionController@index')->name('permision');
    Route::post('permission/create', 'PermissionController@store')->name('permision.create');
    Route::put('permission/edit/{permission}', 'PermissionController@update')->name('permision.edit');

    Route::get('role', 'RoleController@index')->name('role');
    Route::post('role/create', 'RoleController@store')->name('role.create');
    Route::put('role/edit/{role}', 'RoleController@update')->name('role.edit');

    Route::get('user', function() { return App\User::with('roles')->paginate(3); });

    Route::get('category', 'CategoryController@index')->name('category');
    Route::post('category/create', 'CategoryController@store')->name('category.create');
    Route::put('category/edit/{category}', 'CategoryController@update')->name('category.edit');
    Route::delete('category/delete/{category}', 'CategoryController@destroy')->name('category.delete');

    Route::get('food', 'FoodController@index')->name('food');
    Route::post('food/create', 'FoodController@store')->name('food.create');
    Route::put('food/edit/{food}', 'FoodController@update')->name('food.edit');

    Route::get('beverage', 'BeverageController@index')->name('beverage');
    Route::post('beverage/create', 'BeverageController@store')->name('beverage.create');
    Route::put('beverage/edit/{beverage}', 'BeverageController@update')->name('beverage.edit');

    Route::get('order', 'OrderController@index')->name('order');
    Route::post('order/create', 'OrderController@store')->name('order.create');
});