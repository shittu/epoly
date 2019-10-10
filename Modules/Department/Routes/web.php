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


	//result routes
	Route::prefix('result')
	->name('result.')
	->namespace('Course')
	->group(function() {
		Route::get('{result_id}/review', 'AmendResultController@review')->name('review');
		Route::get('{result_id}/amend', 'AmendResultController@amend')->name('amend');
		Route::post('{result_id}/approve', 'AmendResultController@amend')->name('approve');
		Route::post('{result_id}/amend/register', 'AmendResultController@amendResult')->name('amend.register');
	});


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
			Route::post('{course_id}/update-course', 'CourseController@update')->name('update');
			Route::get('{course_id}/edit-course', 'CourseController@edit')->name('edit');
			Route::post('/register-course', 'CourseController@register')->name('register');
			Route::get('{course_id}/delete-course', 'CourseController@delete')->name('delete');

			Route::prefix('allocation')
			->name('allocation.')
			->group(function() {
				Route::get('/', 'CourseAllocationController@index')->name('index');
				Route::post('/register', 'CourseAllocationController@register')->name('register');
				
			});
			
		});

		

		Route::prefix('admission')
		->name('admission.')
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
    
});
