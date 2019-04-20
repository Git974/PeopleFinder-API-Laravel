<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('admins', 'AdminController@index')->name('admins');
Route::get('users', 'UserController@index')->name('users');
Route::get('missingpersons', 'MissingPersonController@index')->name('missingpersons');
Route::get('locations', 'LocationController@index')->name('locations');
Route::get('notifications', 'NotificationController@index')->name('notifications');
Route::get('images', 'ImageController@index')->name('images');
Route::get('personlocations', 'PersonLocationController@index')->name('personlocations');


Route::get('admins/{id}', 'AdminController@show')->name('admin');
Route::get('users/{id}', 'UserController@show')->name('user');
Route::get('missingpersons/{id}', 'MissingPersonController@show')->name('missingperson');
Route::get('locations/{id}', 'LocationController@show')->name('location');
Route::get('notifications/{id}', 'NotificationController@show')->name('notification');
Route::get('images/{id}', 'ImageController@show')->name('image');
Route::get('personlocations/{id}', 'PersonLocationController@show')->name('personlocation');



//Route::get('locations/{id}/personlocations', 'Location@personlocations')->name('missingperson');

Route::get('missingpersons/{missingPerson}/personlocations', 'MissingPersonController@person_locations')->name('missingperson_location');
Route::get('missingpersons/name/{name}', 'MissingPersonController@search_by_name');
Route::get('missingpersons/cnic/{cnic}', 'MissingPersonController@search_by_cnic');
Route::get('missingpersons/age/{age}', 'MissingPersonController@search_by_age');
Route::get('missingpersons/{missingPerson}/images', 'MissingPersonController@image');

Route::get('users/{user}/notifications', 'UserController@notifications')->name('user_notification');
Route::get('users/username/{username}', 'UserController@search_by_username');




Route::post('admins', 'AdminController@store')->name('add_admin');
Route::post('users', 'UserController@store')->name('add_user');
Route::post('missingpersons', 'MissingPersonController@store')->name('add_missingperson');
Route::post('locations', 'LocationController@store')->name('add_location');
Route::post('notifications', 'NotificationController@store')->name('add_notification');
Route::post('images', 'ImageController@store')->name('add_image');
Route::post('personlocations', 'PersonLocationController@store')->name('add_personlocation');



Route::put('admins/{admin}', 'AdminController@update')->name('update_admin');
Route::put('users/{user}', 'UserController@update')->name('update_user');
Route::put('missingpersons/{missingPerson}', 'MissingPersonController@update')->name('update_missingperson');
Route::put('locations/{location}', 'LocationController@update')->name('update_location');
Route::put('notifications/{notification}', 'NotificationController@update')->name('update_notification');
Route::put('images/{image}', 'ImageController@update')->name('update_image');
Route::put('personlocations/{personLocation}', 'PersonLocationController@update')->name('update_personlocation');



Route::delete('admins/{admin}', 'AdminController@delete')->name('delete_admin');
Route::delete('users/{user}', 'UserController@delete')->name('delete_user');
Route::delete('missingpersons/{missingPerson}', 'MissingPersonController@delete')->name('delete_missingperson');
Route::delete('locations/{location}', 'LocationController@delete')->name('delete_location');
Route::delete('notifications/{notification}', 'NotificationController@delete')->name('delete_notification');
Route::delete('images/{image}', 'ImageController@delete')->name('delete_image');
Route::delete('personlocations/{personLocation}', 'PersonLocationController@delete')->name('delete_personlocation');
