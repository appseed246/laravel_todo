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

// タスク入力ページ
Route::prefix('form')->group(function() {
    Route::get('/input', 'IndexController@input')->name('form.input');
    Route::match(['get', 'post'], '/confirm', 'IndexController@confirm')->name('form.confirm');
    Route::post('/commit', 'IndexController@commit')->name('form.commit');
});

// 管理ページ
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.top');
    Route::post('/login', 'AdminController@login')->name('admin.login');
    Route::get('/home', 'AdminController@home')->name('admin.home');
});

//Route::prefix('/login', '');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
