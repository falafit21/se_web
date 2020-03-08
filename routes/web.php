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
