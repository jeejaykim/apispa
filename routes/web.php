<?php
// Home
Route::get('/','HomeController@index')->name('home.index');
Route::prefix('/')->group(function () {
    Route::get('reservation/{schedule}/{staff}','HomeController@reserve')->name('home.reserve');
    Route::post('reservation/{schedule}/{staff}','HomeController@store')->name('home.store');
});

// Dashboard
Route::prefix('dashboard')->group(function () {
    Route::get('/','DashboardController@index')->name('dashboard.index');
    Route::get('/customers','DashboardController@customer')->name('dashboard.customer');
    Route::get('/today','DashboardController@today')->name('dashboard.today');
    Route::get('/all_reservations','DashboardController@all_reservations')->name('dashboard.allreservations');
    Route::get('/trash','DashboardController@trash')->name('dashboard.trash');
    Route::get('/trash/{id}','DashboardController@restore')->name('reservation.restore');
});

// User
Route::prefix('user')->group(function () {
    Route::get('/{user}/profile','UserController@profile')->name('user.profile');
    Route::put('/{user}/profile','UserController@avatar')->name('user.avatar');
    Route::get('/{user}/activate','UserController@activate')->name('user.activate');
    Route::get('/{user}/deactivate','UserController@deactivate')->name('user.deactivate');
    Route::get('/{user}/setting','UserController@setting')->name('user.setting');
    Route::put('/{user}/update_password','UserController@update_password')->name('user.update_password');
    Route::get('/{user}/expense','UserController@expense')->name('expense.show');
    Route::put('/{user}/expense','UserController@add_expense')->name('expense.add');
});
Route::resource('user', 'UserController');

// Reservation
Route::prefix('reservation')->group(function () {
    Route::get('/reserve/{schedule}/{user}','Reservation\ReservationController@preview')->name('reservation.preview');
    Route::post('/reserve/{schedule}/{user}','Reservation\ReservationController@store')->name('reservation.store');
    Route::put('/create/save','Reservation\ReservationController@save')->name('reservation.save');
    Route::put('/activate/{reservation}','Reservation\ReservationController@activate')->name('reservation.activate');
});

// Prereservation
Route::prefix('prereservation')->group(function () {
    Route::get('/{schedule}/{user}','Reservation\PrereservationController@show')->name('prereservation.show');
    Route::post('/{schedule}/{user}','Reservation\PrereservationController@store')->name('prereservation.store');
    Route::view('/success', 'prereservation.success')->name('prereservation.success');
});

//Records
Route::prefix('record')->group(function () {
    Route::get('/','RecordController@revenue')->name('record.revenue');
    // Route::get('/{id}/{type}/{month}','RecordController@show')->name('record.show');
    Route::post('/search','RecordController@search')->name('record.search');
});


Auth::routes();

Route::resource('schedule', 'ScheduleController', ['except' => ['edit', 'show', 'update'] ]);
Route::resource('service', 'ServiceController');
Route::resource('category', 'CategoryController');
Route::resource('attendance', 'AttendanceController');
Route::resource('reservation','Reservation\ReservationController');
Route::resource('addon', 'AddOnController');
Route::resource('expense', 'ExpenseController');
Route::get('/expense/add','ExpenseController@add')->name('expense.add');