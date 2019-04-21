# People_Finder_API_Laravel

These Restful APIs are developed using Laravel Framework.

Use these to access APIs endpoints:

You need to provide the ```X-API-Key``` in headers with its token value to access following endpoints


# Use these endpoints to fetch existing record

{

  "Request Type" : "GET",
  
  "All Records" : {
  
    'api/admins' : "It will return all the admins",
    
    'api/users'  : "It will return all the users",
    
    'api/missingpersons' : "It will return all the missing persons",
    
    'api/locations' : "It will return all the locations",
    
    'api/notifications' : "It will return all the notifications",
    
    'api/images' : "It will return all the images",
    
    'api/personlocations' : "It will return all the detected person locations"
    
  },
  
  "Specific Record" : {
  
    'api/admins/{id}' : "It will return the admin that would match the id",
    
    'api/users/{id}'  : "It will return all the user that would match the id",
    
    'api/missingpersons/{id}' : "It will return all the missing person that would match the id",
    
    'api/locations/{id}' : "It will return all the location that would match the id",
    
    'api/notifications/{id}' : "It will return all the notification that would match the id",
    
    'api/images/{id}' : "It will return all the image that would match the id",
    
    'api/personlocations/{id}' : "It will return all the detected person location that would match the id"
    
  },
  
  "Searched Records" : {
  
    'api/missingpersons/{id}/personlocations' : "It will return the location where person was detected along with detected time",
    
    'api/missingpersons/name/{firstName}' : "It will return all the missing persons that have given first name",
    
    'api/missingpersons/cnic/{cnic}' : "It will return the missing person who has given cnic",
    
    'api/missingpersons/age/{age}' : "It will return all the missing persons that have given age",
    
    'api/missingpersons/{id}/images' : "It will return the image record that is associated with that missing person",
    
    'api/users/{id}/notifications' : "It will return all the notifications associated with that user",
    
    'api/users/username/{username}' : "It will return user who has given username"
    
  } 
  
}


# Use these endpoints to create new record
You also need to provide the data in json format

{

  "Request Type" : "POST",
  
  "Create Record" : {
  
    'api/admins' : "It will create the admin",
    
    'api/users'  : "It will create the user",
    
    'api/missingpersons' : "It will create the missing person",
    
    'api/locations' : "It will create the location",
    
    'api/notifications' : "It will create the notification",
    
    'api/images' : "It will create the image",
    
    'api/personlocations' : "It will create the detected person location"
    
  }
  
}



# Use these endpoints to update record
You also need to provide the data in json formate

{

  "Request Type" : "PUT",
  
  "Update Record" : {
  
    'api/admins/{id}' : "It will update the admin record",
    
    'api/users/{id}'  : "It will update the user record",
    
    'api/missingpersons/{id}' : "It will update the missing person record",
    
    'api/locations/{id}' : "It will update the location record",
    
    'api/notifications/{id}' : "It will update the notification record",
    
    'api/images/{id}' : "It will update the image record",
    
    'api/personlocations/{id}' : "It will update the person location record"
    
  }
  
}



# Use these to delete record

{

  "Request Type" : "DELETE",  
  
  "Delete Record" : {
  
    'api/admins/{id}' : "It will delete the admin record",
    
    'api/users/{id}'  : "It will delete the user record",
    
    'api/missingpersons/{id}' : "It will delete the missing person record",
    
    'api/locations/{id}' : "It will delete the location record",
    
    'api/notifications/{id}' : "It will delete the notification record",
    
    'api/images/{id}' : "It will delete the image record",
    
    'api/personlocations/{id}' : "It will delete the person location record"
    
  }
  
}



# Keys For Pagination
Some responses from endpoints will be in form of pagination so try to use these keys to access its values to move between different pages

{
    
    "first_page_url" : "It contain the url of first page",
    
    "last_page_url" : "It contain the url of last page",
    
    "next_page_url" : "It contain the url for next page",
    
    "prev_page_url" : "It contain the url for prev page",
    
    "total" : "It contain the total number of records",
    
    "current_page" : "It contain the current page number",
    
    "data" : "It contain the record for the current page"

}

# How to Set Database

- Open .env file
- Set the DB_DATABASE value with your database name
- Set the DB_USERNAME value with your mysql username
- Set the DB_PASSWORD value with your mysql password
- Save and close the file

# How to create schema

- Open Your Terminal
- Go to your project directory
- run the command ```php artisan migrate```
- Now you are ready to go!

