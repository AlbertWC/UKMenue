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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Venue
Route::get('/adminvenues','VenueController@adminindex');
Route::resource('venues', 'VenueController');

//Calendar
Route::resource('events', 'CalendarController');

//Feedback 
Route::resource('feedbacks', 'FeedbacksController');
Route::get('/adminfeedback','FeedbacksController@admindisplay');

//Admin event approval
Route::prefix('calendars')->group(function()
{
    Route::get('/approval', 'ApprovalController@approval');
    Route::post('/approval', 'ApprovalController@updateevent');
    Route::get('/displayevents', 'CalendarController@displaycalendar');
});

//admin 

Route::prefix('admin')->group(function()
{
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Route::get('/testing', function()
{
    return view('testing');
});
