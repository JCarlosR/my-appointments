<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); // {{ route('home') }}

Route::middleware(['auth', 'admin'])->namespace('Admin')->group(function () {
    // Specialty
	Route::get('/specialties', 'SpecialtyController@index');
	Route::get('/specialties/create', 'SpecialtyController@create'); // form registro
	Route::get('/specialties/{specialty}/edit', 'SpecialtyController@edit');
	Route::post('/specialties', 'SpecialtyController@store'); // envío del form
	Route::put('/specialties/{specialty}', 'SpecialtyController@update');
	Route::delete('/specialties/{specialty}', 'SpecialtyController@destroy');
	// Doctors
	Route::resource('doctors', 'DoctorController');
	// Patients
	Route::resource('patients', 'PatientController');
});

Route::middleware(['auth', 'doctor'])->namespace('Doctor')->group(function () {
    Route::get('/schedule', 'ScheduleController@edit');
    Route::post('/schedule', 'ScheduleController@store');
});