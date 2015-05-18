<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// not log in
Route::get('/', 'WelcomeController@index');

//home page
Route::get('home', 'HomeController@index');
Route::get('home', 'TripsController@index');

//add friend

Route::resource('friend', 'FriendsController@addFriends');

//bucket list page

Route::resource('trip', 'TripsController');
Route::resource('activity', 'ActivitiesController');

/*
Route::get('trip', 'TripsController@index');
Route::get('trip/create', 'TripsController@create');
Route::get('trip/{id}', 'TripsController@show');
Route::post('trip', 'TripsController@store');
*/

//friends



//planning



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
