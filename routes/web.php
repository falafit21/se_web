<?php


Route::get('/', function () {
    return redirect()->route('post.index');
});

Route::get('/user/profile', 'UsersController@getUserProfile')->name("users.profile");
Route::resource('/user', 'UsersController');
Route::resource('/post', 'PostsController');

//comment
//Route::resource('/comments', 'CommentController');
Route::post('/posts/{post_id}/comment', 'PostsController@commentStore')->name('post.comment.store');

//doctor
Route::get('/docProfile', 'UsersController@getDocProfile');
Route::get('/admin/createDoc', 'UsersController@createDoc')->name('admin.createDoc');
Route::resource('/doctorLists','DoctorListsController');

Route::resource('/petTip', 'PetTipsController');

//admin
Route::get('/admin/viewMembers', 'UsersController@index');

//pet
//Route::get('/pet/createPet','PetsController@createPet');
Route::resource('/pet', 'PetsController');

//auth
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
