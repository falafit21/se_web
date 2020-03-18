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
//Route::get('/petTips/tip', 'PetTipsController@show');

//admin
Route::get('/admin/viewMembers', 'UsersController@index');

//pet
//Route::get('/pet/createPet','PetsController@createPet');
Route::resource('/pet', 'PetsController');
Route::post('/pets/{pet_id}/update', 'PetsController@update')->name('pet.update');
Route::get('pets/{vaccine_id}/date','PetsController@calculate')->name('pet.calculate');
Route::post('/pet/{pet_id}/edit','PetsController@update');
Route::get('/pets/{pet_id}/edit', 'PetsController@edit')->name('pet.edit');



Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
