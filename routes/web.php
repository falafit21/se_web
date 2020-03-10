<?php


Route::get('/', function () {
    return view('/home');
});

Route::get('/user', 'UsersController@getUserProfile');
Route::resource('/post', 'PostsController');

//comment
//Route::resource('/comments', 'CommentController');
Route::post('/posts/{post_id}/{user_id}/comment', 'PostsController@commentStore')->name('post.comment.store');

//doctor
Route::get('/docProfile', 'UsersController@getDocProfile');
Route::get('/admin/createDoc', 'UsersController@createDoc');
Route::resource('/doctorLists','DoctorListsController');

//admin
Route::get('/admin/viewMembers', 'UsersController@index');

//pet
//Route::get('/pet/createPet','PetsController@createPet');
Route::resource('/pet', 'PetsController');

//auth
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
