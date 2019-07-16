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

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'Auth\RegisterController@register');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');
});

Route::get('users', 'UserController@index')->name('user-index');
Route::get('users/create', 'UserController@create')->name('users-create');
Route::get('users', 'UserController@store')->name('user-store');
Route::get('users/{user}/edit', 'UserController@edit')->name('user-edit');
Route::patch('users/{user}', 'UserController@update')->name('customer-update');
Route::delete('users/{user}', 'UserController@destroy')->name('user-destroy');



Route::get('/home', 'HomeController@index')->name('home');
