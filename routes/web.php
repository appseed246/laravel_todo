<?php

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
Route::prefix('form')->group(function() {
    Route::get('input', 'IndexController@input');
    Route::match(['get', 'post'], 'confirm', 'IndexController@confirm');
    Route::post('commit', 'IndexController@commit');
});