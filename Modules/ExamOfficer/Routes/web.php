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

Route::prefix('exam-officer')
    ->name('exam.officer.')
    ->group(function() {
        Route::get('/', 'ExamOfficerController@verify')->name('verify');
	    Route::get('/dashboard', 'ExamOfficerController@index')->name('dashboard');
	    Route::get('/login', 'Auth\ExamOfficerLoginController@showLoginForm')->name('auth.login');
	    Route::post('/login', 'Auth\ExamOfficerLoginController@login')->name('login');
	    Route::post('logout', 'Auth\ExamOfficerLoginController@logout')->name('auth.logout');
	//result routes    
    Route::prefix('results')
    ->name('result.')
    ->group(function() {
    	//vetting result routes
        Route::prefix('vetting')
	    ->name('vetting.')
	    ->namespace('Results')
	    ->group(function() {
            Route::get('/', 'VettingResultController@index')->name('index');
		    Route::post('/search', 'VettingResultController@search')->name('search');
		    Route::get('/semester/{semester_id}/view', 'VettingResultController@view')->name('view');
	    });
	    //student results routes
	    Route::prefix('student')
	    ->namespace('Results')
	    ->name('student.')
	    ->group(function() {
            Route::get('/create', 'StudentResultController@index')->name('index');
            Route::get('sesmester/{semester_id}/view', 'StudentResultController@viewResult')->name('view');
            Route::post('/search', 'StudentResultController@searchResult')->name('search');
        });
    });
	    
});
