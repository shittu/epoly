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

Route::prefix('department')
->name('department.')
->group(function() {
	Route::get('/', 'DepartmentController@verify')->name('verify');
	Route::get('/hod', 'DepartmentController@verify')->name('verify');
	//hod authentication routes
	Route::prefix('hod')
		->name('hod.')
		->group(function() {
			Route::get('/dashboard', 'DepartmentController@index')->name('dashboard');
			Route::get('/login', 'Auth\DepartmentLoginController@showLoginForm')->name('auth.login');
			Route::get('/Authorisation/fail', 'Auth\DepartmentLoginController@unauthorize')->name('auth.auth');

			Route::get('/unauthorize-staff', 'Auth\DepartmentLoginController@unauthorize')->name('auth.unauthorize');
			Route::post('/login', 'Auth\DepartmentLoginController@login')->name('login');
			Route::post('logout', 'Auth\DepartmentLoginController@logout')->name('auth.logout');
		});
		Route::prefix('course')
		->name('course.')
		->namespace('Course')
		->group(function() {

			Route::get('/', 'CourseController@index')->name('index');
			Route::get('/create-course', 'CourseController@create')->name('create');
			Route::post('/update-course', 'CourseController@update')->name('update');
			Route::post('/register-course', 'CourseController@register')->name('register');
			Route::get('/delete-course', 'CourseController@delete')->name('delete');
			
		});
    
});
