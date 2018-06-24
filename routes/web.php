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
    //return view('welcome');
    return redirect()->route('user.login');
});

// タスク入力ページ
Route::prefix('user')->namespace('User')->as('user.')->group(function() {
    Route::get('/', function() {
        return redirect()->route('user.login');
    });
    Route::get('/login', function() {
        return redirect()->route('user.input');
    })->name('user.login');
    Route::get('/home', 'IndexController@input')->name('input');
    Route::match(['get', 'post'], '/confirm', 'IndexController@confirm')->name('confirm');
    Route::post('/commit', 'IndexController@commit')->name('commit');
});

// 管理ページ
Route::prefix('admin')->namespace('Admin')->as('admin.')->group(function () {
    Route::get('/', 'AdminController@index')->name('top');
    Route::post('/login', 'AdminController@login')->name('login');
    Route::get('/home', 'AdminController@home')->name('home');
});

//Route::prefix('/login', '');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
