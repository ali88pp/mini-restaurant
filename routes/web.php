<?php

Route::view('/', 'app')->middleware('auth');

Route::get('login', 'Auth\LoginController@index')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::post('permission', 'PermissionController@index')->name('permision');
Route::post('permission/create', 'PermissionController@store')->name('permision.create');
Route::put('permission/edit/{permission}', 'PermissionController@update')->name('permision.edit');

Route::post('role', 'RoleController@index')->name('role');
Route::post('role/create', 'RoleController@store')->name('role.create');
Route::put('role/edit/{role}', 'RoleController@update')->name('role.edit');

Route::get('food', 'FoodController@index')->name('food');
Route::post('food/create', 'FoodController@store')->name('food.create');
Route::put('food/edit/{food}', 'FoodController@update')->name('food.edit');

Route::post('user', function() {
    return App\User::with('roles')->paginate(3);
});



// Route::get('/floors', 'FloorController@index')->name('floor');
// Route::get('/floor/create', 'FloorController@create')->name('floor.create');
// Route::post('/floor/create', 'FloorController@store');
// Route::get('/floor/{id}/edit', 'FloorController@edit')->name('floor.edit');
// Route::put('/floor/{id}/edit', 'FloorController@update');
// Route::delete('/floor/{id}', 'FloorController@destroy')->name('floor.destroy');
// Route::get('/floor/{id}', 'FloorController@show')->name('floor.show');

// Route::get('/tables', 'TableController@index')->name('table');
// Route::get('/table/create', 'TableController@create')->name('table.create');
// Route::post('/table/create', 'TableController@store');
// Route::get('/table/{id}/edit', 'TableController@edit')->name('table.edit');
// Route::put('/table/{id}/edit', 'TableController@update');
// Route::get('/table/{id}', 'TableController@show')->name('table.show');
// Route::delete('/table/{id}', 'TableController@destroy')->name('table.destroy');

// Route::get('/categories', 'CategoryController@index')->name('category');
// Route::get('/category/create', 'CategoryController@create')->name('category.create');
// Route::post('/category/create', 'CategoryController@store');
// Route::get('/category/{id}/edit', 'CategoryController@edit')->name('category.edit');
// Route::put('/category/{id}/edit', 'CategoryController@update');
// Route::get('/category/{id}', 'CategoryController@show')->name('category.show');
// Route::delete('/category/{id}', 'CategoryController@destroy')->name('category.destroy');

// Route::get('/items', 'ItemController@index')->name('item');
// Route::get('/item/create', 'ItemController@create')->name('item.create');
// Route::post('/item/create', 'ItemController@store');
// Route::get('/item/{id}/edit', 'ItemController@edit')->name('item.edit');
// Route::put('/item/{id}/edit', 'ItemController@update');
// Route::get('/item/{id}', 'ItemController@show')->name('item.show');
// Route::delete('/item/{id}', 'ItemController@destroy')->name('item.destroy');

// Route::get('/customers', 'CustomerController@index')->name('customer');
// Route::get('/customer/create', 'CustomerController@create')->name('customer.create');
// Route::post('/customer/create', 'CustomerController@store');
// Route::get('/customer/{id}/edit', 'CustomerController@edit')->name('customer.edit');
// Route::put('/customer/{id}/edit', 'CustomerController@update');
// Route::get('/customer/{id}', 'CustomerController@show')->name('customer.show');
// Route::delete('/customer/{id}', 'CustomerController@destroy')->name('customer.destroy');

// Route::get('/orders', 'OrderController@index')->name('order');
// Route::get('/order/create', 'OrderController@create')->name('order.create');
// Route::post('/order/create', 'OrderController@store');
// Route::get('/order/{id}/edit', 'OrderController@edit')->name('order.edit');
// Route::put('/order/{id}/edit', 'OrderController@update');
// Route::get('/order/{id}', 'OrderController@show')->name('order.show');
// Route::delete('/order/{id}', 'OrderController@destroy')->name('order.destroy');
