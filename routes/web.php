<?php

use Illuminate\Http\Request;
use Modules\Admin\Entities\Session;
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

Route::view('/','welcome')->name('welcome');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/calender/{session}/view', function(){
	return view('admin::calender.view');
})->name('admin.calender.view');
Route::post('/calender/acticate/register', function(Request $request){
    currentSession()->update(['status'=>0]);
    Session::find($request->session)->update(['status'=>1]);
    session()->flash('message','Congratulation '.currentSession()->name.' is now activated as the new active session');
    return redirect()->route(home_route());

})->name('admin.session.activate.register');

