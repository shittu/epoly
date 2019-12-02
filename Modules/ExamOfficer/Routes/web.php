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

        Route::prefix('department/course')
		->name('department.course.')
		->namespace('Course')
		->group(function() {

			Route::get('/', 'CourseController@index')->name('index');
			Route::get('/create-course', 'CourseController@create')->name('create');
			Route::post('{course_id}/update-course', 'CourseController@update')->name('update');
			Route::get('{course_id}/edit-course', 'CourseController@edit')->name('edit');
			Route::post('/register-course', 'CourseController@register')->name('register');
			Route::get('{course_id}/delete-course', 'CourseController@delete')->name('delete');
			
		});
        //admission routes
        Route::prefix('student/admission')
		->name('student.admission.')
		->namespace('Admission')
		->group(function() {

			Route::get('/', 'AdmissionController@index')->name('index');

			Route::get('/create-admission', 'AdmissionController@create')->name('create');

			Route::post('{admission_id}/update-admission', 'AdmissionController@update')->name('update');

			Route::get('{admission_id}/edit-admission', 'AdmissionController@edit')->name('edit');

			Route::get('{admission_id}/revoke-admission', 'AdmissionController@revokeAdmission')->name('revoke');

			Route::post('/register-admission', 'AdmissionController@register')->name('register');

			Route::get('{admission_id}/delete-admission', 'AdmissionController@delete')->name('delete');
			
		});




        Route::get('/', 'ExamOfficerController@verify')->name('verify');
	    Route::get('/dashboard', 'ExamOfficerController@index')->name('dashboard');
	    Route::get('/login', 'Auth\ExamOfficerLoginController@showLoginForm')->name('auth.login');
	    Route::post('/login', 'Auth\ExamOfficerLoginController@login')->name('login');
	    Route::post('logout', 'Auth\ExamOfficerLoginController@logout')->name('auth.logout');
		Route::get('/Authorisation/fail', 'Auth\ExamOfficerLoginController@unauthorize')->name('auth.auth');
	//graduation routes
    Route::prefix('graduation')
    ->name('graduation.')
    ->namespace('Graduation')
    ->group(function() {
        Route::get('/', 'GraduationController@graduationIndex')->name('graduate.index');
        Route::get('/spill', 'GraduationController@spillOverIndex')->name('spill.index');
        Route::get('/with-draw', 'GraduationController@withDrawIndex')->name('withdraw.index');
        Route::post('/search/graduates', 'GraduationController@searchGraduateStudents')->name('search.graduates');
        Route::post('/search/spill-overs', 'GraduationController@searchSpillingStudents')->name('search.spills');
        Route::post('/search/with-draws', 'GraduationController@searchWithDrawedStudents')->name('search.withdraws');
    });
	//result routes    
    Route::prefix('results')
    ->name('result.')
    ->namespace('Results')
    ->group(function() {

    	//vetting result routes
        Route::prefix('vetting')
	    ->name('vetting.')
	    ->group(function() {
            Route::get('/', 'VettingResultController@index')->name('index');
		    Route::post('/search', 'VettingResultController@search')->name('search');
		    Route::get('/semester/{semester_id}/view', 'VettingResultController@view')->name('view');
	    });
        //wave result routes
	    Route::prefix('student/wave')
	    ->name('student.wave.')
	    ->group(function() {
            Route::get('/', 'WaveResultController@index')->name('index');
		    Route::post('/search', 'WaveResultController@search')->name('search');
		    Route::get('/semester/{semester_id}/view', 'WaveResultController@view')->name('view');
		    Route::get('/result/{result_id}/register', 'WaveResultController@waveResult')->name('register');
	    });

	    //score sheet routes
	    Route::prefix('score-sheet')
	    ->name('scoresheet.')
	    ->group(function() {
            Route::get('/download', 'ScoreSheetController@downloadIndex')->name('download.index');
            Route::post('/download/score-sheet', 'ScoreSheetController@downloadScoreSheet')->name('download');
            Route::post('/upload/result', 'ScoreSheetController@uploadScoreSheet')->name('upload');
		    Route::get('/upload', 'ScoreSheetController@uploadIndex')->name('upload.index');
	    });
	    //student results routes
	    Route::prefix('student')
	    ->name('student.')
	    ->group(function() {
            Route::get('/create', 'StudentResultController@index')->name('index');
            Route::get('semester/{semester_id}/view', 'StudentResultController@viewResult')->name('view');
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
