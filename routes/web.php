<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('index');
Route::get('/book/{keyword}', 'App\Http\Controllers\BookApiController@makeUrl');

// 今回開発するメイン機能
Route::group(['prefix' => 'book', 'as' => 'book.', 'middleware' => 'auth'], function () {
    Route::get('/', [BookController::class, 'index'])->name('index');
});

// 他の機能は後々可能性がある程度

Auth::routes();

