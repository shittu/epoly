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
            Route::get('result/{result_id}/edit', 'StudentResultController@edit')->name('edit');
		    Route::post('result/{result_id}/update', 'StudentResultController@update')->name('update');
		    //emc verdict remark registrations
		    Route::prefix('remark')
			->name('remark.')
			->group(function() {
			    Route::get('/', 'ResultRemarkController@index')->name('index');
			    Route::post('semester/{semester_id}/register', 'ResultRemarkController@register')->name('register');
			    Route::post('/registration/search', 'ResultRemarkController@searchRegistration')->name('registration.search');
			    Route::get('semester/{semester_id}/registration/view', 'ResultRemarkController@viewRegistration')->name('registration.view');
			});
        });

        //course results routes
        Route::prefix('course')
	    ->namespace('Results')
	    ->name('course.')
	    ->group(function() {
            Route::get('/create', 'CourseResultController@index')->name('index');
            Route::get('upload/{upload_id}/view', 'CourseResultController@review')->name('review');
            Route::post('/search', 'CourseResultController@search')->name('search');
            Route::get('result/{result_id}/amend', 'CourseResultController@amend')->name('amend');
			Route::post('result/{result_id}/approve', 'CourseResultController@approve')->name('approve');
			Route::post('result/{result_id}/amend/register', 'CourseResultController@amendResult')->name('amend.register');
			Route::get('result/{result_id}/edit', 'CourseResultController@editCourseResult')->name('edit');
        });
    });
	    
});
