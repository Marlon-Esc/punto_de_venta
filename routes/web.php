<?php


Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home','HomeController@index');

// routes de productos
Route::get('/productos', ['as' => 'products.index','uses' => 'productController@index']);
Route::get('/productos/agregar', ['as' => 'products.create','uses' => 'productController@create']);
Route::post('/productos', ['as' => 'products.store','uses' => 'productController@store']);
Route::get('/productos/{id}/edit', ['as' => 'products.edit','uses' => 'productController@edit']);
Route::put('/productos/{id}', ['as' => 'products.update', 'uses' => 'productController@update' ]);
Route::get('/productos/{id}', ['as' => 'products.delete', 'uses' => 'productController@destroy' ]);

//rutas de categorias
Route::get('/categorias', ['as' => 'category.index','uses' => 'categoryController@index']);
Route::put('/categorias', ['as' => 'category.store','uses' => 'categoryController@store']);
Route::post('/edicion', 'categoryController@update');
Route::post('/delete', 'categoryController@destroy');
//Route::post('/categorias/edit','categoryController@update');
//Route::post('/categorias/delete','categoryController@destroy');

//rutas de provedores
Route::get('/provedores', ['as' => 'provider.index','uses' => 'providerController@index']);
Route::post('/addProv','providerController@store');
Route::post('/editProv','providerController@update');
Route::post('/disableProv', 'providerController@disabled');
//Rutas de clientes
Route::get('/clientes', ['as' => 'client.index','uses' => 'ClientesController@index']);
Route::post('/addClient','ClientesController@store');
Route::post('/editClient','ClientesController@update');
Route::post('/disableClient', 'ClientesController@disabled');

//rutas de venta
Route::get('/ventas', ['as' => 'sales.index','uses' => 'SalesController@index']);
Route::post('/ventas/guardar_venta', ['as' => 'sales.pucharse','uses' => 'SalesController@puchar']);
Route::post('/carrito','SalesController@carrito');


//Ruta de ingresos
Route::get('/ingresos', ['as' => 'ingres.index','uses' => 'IngresosController@index']);
Route::post('/detalle', 'IngresosController@show');
