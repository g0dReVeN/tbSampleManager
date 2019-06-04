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
// Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('root')->middleware('verified');
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/patients', 'PatientController@index')->name('patients')->middleware('verified');
Route::post('/patients', 'PatientController@searchPatients')->name('searchpatients')->middleware('verified');
Route::get('/patients/new', 'PatientController@create')->name('newpatient')->middleware('verified');
Route::post('/patients/new', 'PatientController@store')->name('addnewpatient')->middleware('verified');
Route::get('/patients/{id}', 'PatientController@show')->name('showpatient')->middleware('verified');
Route::patch('/patients', 'PatientController@update')->name('updatepatient')->middleware('verified');
Route::delete('/patients', 'PatientController@destroy')->name('deletepatient')->middleware('verified');
Route::get('/samples', 'SampleController@index')->name('samples')->middleware('verified');
Route::post('/samples', 'SampleController@findSample')->name('findSample')->middleware('verified');
Route::post('/samples/new', 'SampleController@store')->name('addsample')->middleware('verified');
Route::get('/samples/{id}', 'SampleController@show')->name('showsample')->middleware('verified');
Route::patch('/samples', 'SampleController@update')->name('updatesample')->middleware('verified');
Route::delete('/samples', 'SampleController@destroy')->name('deletesample')->middleware('verified');

Route::get('/customq', 'SampleController@customQuery')->name('customq')->middleware('verified');
Route::post('/customq', 'SampleController@querySamples')->name('query')->middleware('verified');
Route::get('/customq/download/{file}', 'SampleController@download')->name('exportquery')->middleware('verified');

Route::get('/request', 'RequestController@showRequest')->name('requests')->middleware('verified');
Route::post('/request', 'RequestController@makeRequest')->name('makerequest')->middleware('verified');
Route::post('/requested', 'RequestController@store')->name('submitrequest')->middleware('verified');
Route::get('/requests', 'RequestController@index')->name('requestsadmin')->middleware('verified');
Route::post('/requestsUpdate', 'RequestController@update')->name('requestsupdate')->middleware('verified');
Route::post('/requests', 'RequestController@getBatches')->name('requestsbatches')->middleware('verified');
Route::post('/requests/{batch_id}', 'RequestController@getBatch')->name('requestsbatch')->middleware('verified');


Route::get('/sampleattribute', 'SampleAttributeController@index')->name('sampleattribute')->middleware('verified');
Route::post('/sampleattribute', 'SampleAttributeController@show')->name('findattribute')->middleware('verified');
Route::post('/samplevalue', 'SampleAttributeController@store')->name('addnewvalue')->middleware('verified');
Route::patch('/sampleattribute', 'SampleAttributeController@update')->name('updateattribute')->middleware('verified');
Route::delete('/sampleattribute', 'SampleAttributeController@destroy')->name('deleteattribute')->middleware('verified');
Route::get('/clinics', 'ClinicController@index')->name('clinics')->middleware('verified');
Route::post('/clinics', 'ClinicController@store')->name('clinic')->middleware('verified');
Route::patch('/clinics', 'ClinicController@update')->name('updateclinic')->middleware('verified');
Route::delete('/clinics', 'ClinicController@destroy')->name('deleteclinic')->middleware('verified');
Route::get('/admin', 'UserController@index')->name('admin')->middleware('verified');
Route::patch('/admin', 'UserController@update')->name('update')->middleware('verified');
Route::patch('/admin/deact', 'UserController@deact')->name('deact')->middleware('verified');
Route::delete('/admin', 'UserController@destroy')->name('destory')->middleware('verified');
Route::get('email/verify', 'UserController@verify')->name('verification.notice');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::post('register', 'Auth\RegisterController@register')->name('register');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');