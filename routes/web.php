<?php


Route::get('/', function () {
    return redirect()->route('post.index');
});

Route::get('/user', 'UsersController@getUserProfile')->name("user");
Route::resource('/post', 'PostsController');

//comment
//Route::resource('/comments', 'CommentController');
Route::post('/posts/{post_id}/comment', 'PostsController@commentStore')->name('post.comment.store');

//doctor
Route::get('/docProfile', 'UsersController@getDocProfile');
Route::get('/admin/createDoc', 'UsersController@createDoc');
Route::resource('/doctorLists','DoctorListsController');

Route::resource('/petTip', 'PetTipsController');

//admin
Route::get('/admin/viewMembers', 'UsersController@index');

//pet
//Route::get('/pet/createPet','PetsController@createPet');
Route::resource('/pet', 'PetsController');
//Route::post('/pets/{id}/edit','PetsController')
Route::get('/pets/vaccines','PetsControllers@getVaccine');
//auth
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
