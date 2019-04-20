# People_Finder_API_Laravel

These Restful APIs are developed using Laravel Framework.

Use these routes to access APIs endpoints:

{

  "Request Type" : "GET",
  
  "All Records" : {
  
    'api/admins' : "It will return all the admins",
    
    'api/users'  : "It will return all the users",
    
    'api/missingpersons' : "It will return all the missing persons",
    
    'api/locations' : "It will return all the locations",
    
    'api/notifications' : "It will return all the notifications",
    
    'api/images' : "It will return all the images",
    
    'api/personlocations' : "It will return all the detected personlocations"
    
  },
  
  "Specific Record" : {
    'api/admins/{id}' : "It will return the admin that would match the id",
    'api/users/{id}'  : "It will return all the user that would match the id",
    'api/missingpersons/{id}' : "It will return all the missing person that would match the id",
    'api/locations/{id}' : "It will return all the location that would match the id",
    'api/notifications/{id}' : "It will return all the notification that would match the id",
    'api/images/{id}' : "It will return all the image that would match the id",
    'api/personlocations/{id}' : "It will return all the detected personlocation that would match the id"
  }
  "Searched Records" : {
    'api/missingpersons/{id}/personlocations' : "It will return the location where person was detected along with detected time",
    'api/missingpersons/name/{firstName}' : "It will return all the missing persons that have given first name",
    'api/missingpersons/cnic/{cnic}' : "It will return the missing person who has given cnic",
    'api/missingpersons/age/{age}' : "It will return all the missing persons that have given age",
    'api/missingpersons/{id}/images' : "It will return the image record that is associated with that missing person",
    'api/users/{id}/notifications' : "It will return all the notifications associated with that user",
    'api/users/username/{username}' : "It will return user who has given username"
  } 
},
{
  "Request Type" : "POST",
  "Create Record" : {
    'api/admins' : "It will create the admins",
    'api/users'  : "It will create the users",
    'api/missingpersons' : "It will create the missing persons",
    'api/locations' : "It will create the locations",
    'api/notifications' : "It will create the notifications",
    'api/images' : "It will create the images",
    'api/personlocations' : "It will create the detected personlocations"
  }
}


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
