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

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register');

Route::get('/home', 'HomeController@index');

Route::group(['prefix'=>'admin', 'middleware'=>['auth','admin']], function() {
    Route::get('/', 'HomeController@index');
    Route::resource('publisher', 'Admin\PublisherController');
    Route::resource('book', 'Admin\BookController');
    Route::resource('user', 'Admin\UserController');
    Route::get('borrower/cari', 'Admin\BorrowerController@search')->name('borrower.search');
    Route::get('borrower/{status}', 'Admin\BorrowerController@index')->name('borrower.index');
    Route::put('borrower/{id}', 'Admin\BorrowerController@update')->name('borrower.update');
    Route::delete('borrower/{id}', 'Admin\BorrowerController@destroy')->name('borrower.destroy');
});

Route::group(['prefix'=>'member', 'middleware'=>['auth','member']], function() {
    Route::get('/', 'HomeController@index');
    Route::resource('peminjam', 'Member\BorrowerController');
});
