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

Route::prefix('admin')->group(function() {
  Route::get('/', 'AdminController@verify')->name('admin');
  Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.auth.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login');
  Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin.auth.logout');
  //college route group
  Route::prefix('college')
    ->namespace('School')
    ->name('admin.college.')
    ->group(function() {
  	Route::get('/', 'CollegeController@index')->name('index');
  	Route::get('/create', 'CollegeController@create')->name('create');
  	Route::post('/register', 'CollegeController@register')->name('register');
  	Route::post('/update', 'CollegeController@update')->name('update');
  });
});
