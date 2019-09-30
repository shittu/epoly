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

Route::prefix('student')
->name('student.')
->group(function() {
    Route::get('/', 'StudentController@verify');
	Route::get('/dashboard', 'StudentController@index')->name('dashboard');
	Route::get('/login', 'Auth\StudentLoginController@showLoginForm')->name('auth.login');
	Route::get('/unauthorize-student', 'Auth\StudentLoginController@unauthorize')->name('auth.auth');
	Route::post('/login', 'Auth\StudentLoginController@login')->name('login');
	Route::post('logout', 'Auth\StudentLoginController@logout')->name('auth.logout');

	Route::prefix('course')
	->name('course.')
	->namespace('Course')
	->group(function() {

        Route::prefix('registration')
		->name('registration.')
		->group(function() {
	        Route::get('/', 'CourseRegistrationController@index')->name('index');
             
		});
		
	});
});
