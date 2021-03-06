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

// ユーザーページ
Route::namespace('User')->as('user.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('user.login');
    });
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login')->name('doLogin');
    Route::match(['get', 'post'], '/logout', 'LoginController@logout')->name('logout');

    Route::group(['middleware' => 'auth:user'], function () {
        Route::get('/home', 'IndexController@input')->name('home');
        Route::match(['get', 'post'], '/confirm', 'IndexController@confirm')->name('confirm');
        Route::post('/commit', 'IndexController@commit')->name('commit');
    });
});

// 管理ページ
Route::prefix('admin')->namespace('Admin')->as('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });
    Route::post('/login', 'LoginController@login')->name('doLogin');
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::match(['get', 'post'], '/logout', 'LoginController@logout')->name('logout');
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/home', 'HomeController@index')->name('home');
    });
});
