<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

    //PRODUCTOS
    Route::get('/','Controller@index');
    Route::get('/products','ProductsController@index');
    Route::get('/products/view','ProductsController@show');
    Route::post('/products/edit','ProductsController@update');
    Route::post('/products/create','ProductsController@create');
    Route::post('/products/delete','ProductsController@destroy');
    //CATEGORIA
    Route::get('/category','CategoryController@index');
    Route::get('/category/view','CategoryController@show');
    Route::post('/category/edit','CategoryController@update');
    Route::post('/category/create','CategoryController@create');
    Route::post('/category/delete','CategoryController@destroy');
    Route::get('/category/listaCategoria','CategoryController@list');
    //REPORTS
    Route::get('/products/Report','ProductsController@Report');
    Route::get('/products/listarProducto','ProductsController@listProduct');
    Route::get('/products/listarTodoProducto','ProductsController@listTodoProduct');


