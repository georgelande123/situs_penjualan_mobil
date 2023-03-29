<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\LoginController;

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
    return view('about');
})->middleware('auth');



//Buyers
Route::get('/buyers', 'App\Http\Controllers\BuyersController@index')->middleware('auth');;
Route::get('/buyers/create', 'App\Http\Controllers\BuyersController@create');
Route::get('/buyers/{buyer}', 'App\Http\Controllers\BuyersController@show');
Route::post('/buyers', 'App\Http\Controllers\BuyersController@store');
Route::delete('/buyers/{buyer}', 'App\Http\Controllers\BuyersController@destroy');
Route::get('/buyers/{buyer}/edit', 'App\Http\Controllers\BuyersController@edit');
Route::patch('/buyers/{buyer}', 'App\Http\Controllers\BuyersController@update');

//Stocks
Route::get('/stocks', 'App\Http\Controllers\StocksController@index')->middleware('auth');
Route::get('/stocks/create', 'App\Http\Controllers\StocksController@create');
Route::get('/stocks/{stock}', 'App\Http\Controllers\StocksController@show');
Route::post('/stocks', 'App\Http\Controllers\StocksController@store');
Route::delete('/stocks/{stock}', 'App\Http\Controllers\StocksController@destroy');
Route::get('/stocks/{stock}/edit', 'App\Http\Controllers\StocksController@edit');
Route::patch('/stocks/{stock}', 'App\Http\Controllers\StocksController@update');

Route::get('/penjualan', 'App\Http\Controllers\PenjualanController@index')->middleware('auth');

Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login')->middleware('guest');
Route::post('/login', 'App\Http\Controllers\LoginController@authenticate');
Route::post('/logout', 'App\Http\Controllers\LoginController@logout');


Route::get('/register', 'App\Http\Controllers\RegisterController@index')->middleware('guest');
Route::post('/register', 'App\Http\Controllers\RegisterController@store');
// Route::get('/login', [LoginController::class, '@index']);

Route::get('/send-email', [MailController::class, 'sendEmail']);
