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
    return view('index');
});

Route::resource('products', 'ProductController');
Route::get('products/{product}/delete', 'ProductController@delete')->name('products.delete');

Route::resource('units', 'UnitController');
Route::get('units/{unit}/delete', 'UnitController@delete')->name('units.delete');

\Illuminate\Support\Facades\Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
