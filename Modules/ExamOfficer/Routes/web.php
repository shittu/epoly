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

Route::prefix('examo-fficer')
->name('exam.officer.')
->group(function() {
    Route::get('/', 'ExamOfficerController@verify')->name('verify');
	  Route::get('/dashboard', 'ExamOfficerController@index')->name('dashboard');
	  Route::get('/login', 'Auth\ExamOfficerLoginController@showLoginForm')->name('auth.login');
	  Route::post('/login', 'Auth\ExamOfficerLoginController@login')->name('login');
	  Route::post('logout', 'Auth\ExamOfficerLoginController@logout')->name('auth.logout');
});
