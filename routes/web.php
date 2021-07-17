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

Route::get('/', 'HomeController@index')->name('index');
Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);
Route::middleware(['auth' ])->group(function () {
    Route::get('/home', 'HomeController@home')->name('home');
    Route::resource('user', 'UserController');
    Route::resource('volunteer', 'VolunteerController');
    Route::resource('oxygen', 'OxygenController');
    Route::resource('donation', 'DonationController');
    Route::resource('emergency', 'EmergencyController');
});
Route::get('emergency-list', 'VolunteerController@home')->name('emergency-list');
Route::get('donation-list', 'DonationController@home')->name('donation-list');
