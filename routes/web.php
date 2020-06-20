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

Route::get('/', 'TradeController@form')->name('trade.index');
Route::post('/sell', 'TradeController@sell')->name('trade.sell');

Route::resource('products', 'ProductController');
Route::get('products/{product}/delete', 'ProductController@delete')->name('products.delete');

Route::resource('units', 'UnitController');
Route::get('units/{unit}/delete', 'UnitController@delete')->name('units.delete');

Route::resource('wallets', 'WalletController');
Route::get('wallets/{wallet}/delete', 'WalletController@delete')->name('wallets.delete');

Route::get('transactions', 'TransactionController@index')->name('transactions.index');
Route::get('transactions/{transaction}', 'TransactionController@show')->name('transactions.show');
Route::get('wallets/{wallet}/transactions', 'TransactionController@create')->name('transactions.create');
Route::post('wallets/{wallet}/transactions', 'TransactionController@store')->name('transactions.store');

\Illuminate\Support\Facades\Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
