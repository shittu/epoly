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

Route::prefix('lecturer')
->name('lecturer.')
->group(function() {
    Route::get('/', 'LecturerController@verify')->name('verify');
    Route::get('/dashboard', 'LecturerController@index')->name('dashboard');
    Route::get('/login', 'Auth\LecturerLoginController@showLoginForm')->name('auth.login');
    Route::post('/login', 'Auth\LecturerLoginController@login')->name('login');
    Route::post('logout', 'Auth\LecturerLoginController@logout')->name('auth.logout');

    Route::prefix('result')
	->name('result.')
	->namespace('Result')
	->group(function() {
        
        Route::prefix('templete')
        ->name('templete.')
        ->group(function() {
            Route::get('/', 'ResultTempleteController@index')->name('index');
            Route::post('/download', 'ResultTempleteController@upload')->name('download');
        });

        Route::prefix('upload')
        ->name('upload.')
        ->group(function() {
            Route::get('/upload/index', 'ResultUploadController@index')->name('index');
            Route::post('/upload', 'ResultUploadController@upload')->name('upload');
        });
	});
});
