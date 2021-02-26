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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/books', 'APIBookController@index');

Route::get('/books', 'BookController@index');
Route::get('/books/create', 'BookController@create');
Route::post('/books/{id}/review', 'BookController@review');
Route::post('/books/{id}/delreview', 'BookController@delreview')->middleware('can:admin');
Route::post('/books/store', 'BookController@store');
Route::get('/books/{id}', 'BookController@show');

Route::get('/publishers', 'PublisherController@index');
Route::get('/publishers/create', 'PublisherController@create');
Route::post('/publishers/store', 'PublisherController@store');

Route::get('/publishers/{id}/edit', 'PublisherController@edit');
Route::get('/publishers/{id}', 'PublisherController@show');

Route::put('/publishers/{id}', 'PublisherController@update');


Route::get('/eshop', 'EshopController@index');
Route::get('/eshop/categories/{id}', 'EshopController@category');
Route::get('/eshop/subcategories/{id}', 'EshopController@subcategory');

Route::get('/bookshops/create', 'BookshopController@create');
Route::post('/bookshops/store', 'BookshopController@store');
Route::get('/bookshops', 'BookshopController@index');

Route::get('/categories', 'CategoryController@index');

Route::post('/categories/store', 'CategoryController@store');
Route::get('/categories/{id}/edit', 'CategoryController@edit');
Route::post('/categories/{id}/update', 'CategoryController@update');
Route::get('/categories/{id}', 'CategoryController@show');
Route::get('/categories/{id}/destroy', 'CategoryController@destroy');

Route::get('/subcategories/{id}/edit', 'SubcategoryController@edit');
Route::post('/subcategories/{id}/update', 'SubcategoryController@update');
Route::post('/subcategories/{id}/store', 'SubcategoryController@store');
Route::post('/subcategories/store', 'SubcategoryController@storeflex');

Route::get('/subcategories/{id}/destroy', 'SubcategoryController@destroy');


Route::get('/reservations', 'ReservationController@index');
Route::get('/reservations/create', 'ReservationController@create');
// ->middleware('auth');
Route::post('/reservations', 'ReservationController@store');

//ORDERS
Route::get('/orders', 'OrderController@index');
Route::post('/orders/store', 'OrderController@store');

Route::get('/search', 'SearchController@books');
