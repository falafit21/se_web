<?php


Route::get('/', function () {
    return view('/home');
});

Route::get('/users', 'UsersController@getUserProfile');
Route::resource('/posts', 'PostsController');


//doctor
Route::get('/docProfile', 'UsersController@getDocProfile');
Route::get('/admin/createDoc', 'UsersController@createDoc');

Route::resource('/doctorLists','DoctorListsController');

//admin
Route::get('/admin/viewMembers', 'UsersController@index');

//pet
//Route::get('/pet/createPet','PetsController@createPet');
Route::resource('/pets', 'PetsController');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
