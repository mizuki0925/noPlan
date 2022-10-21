<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookApiController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');

// 今回開発するメイン機能
Route::group(['prefix' => 'book', 'as' => 'book.', 'middleware' => 'auth'], function () {
    Route::get('/', [BookController::class, 'index'])->name('index');
});

// API関連なのでapi.phpに移動するかも
Route::group(['prefix' => 'bookApi', 'as' => 'bookApi.', 'middleware' => 'auth'], function () {
    Route::get('/search', [BookApiController::class, 'apiExec'])->name('search');
});

// 他の機能は後々可能性がある程度

Auth::routes();
