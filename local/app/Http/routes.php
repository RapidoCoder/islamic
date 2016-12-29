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

Route::group(array('prefix' => 'admin'), function () {
  Route::get('/', ['middleware'=>'admin-loggedin','uses'=>'AdminController@index', 'as'=>'admin-login']);
  Route::get('/dashboard', ['middleware'=>'admin-not-login','uses'=>'AdminController@dashboard', 'as'=>'admin-dashboard']);
  Route::post('authenticate',array('as' => 'admin-authenticate', 'uses'=>'AdminController@authenticate'));
  Route::get('/logout', ['middleware'=>'admin-not-login','uses'=>'AdminController@logout', 'as'=>'admin-logout']);
  Route::get('/settings', ['middleware'=>'admin-not-login','uses'=>'AdminController@settings', 'as'=>'admin-settings']);
  Route::post('/change_name', ['middleware'=>'admin-not-login','uses'=>'AdminController@changeName', 'as'=>'admin-change-name']);
  Route::post('/change-email', ['middleware'=>'admin-not-login','uses'=>'AdminController@changeEmail', 'as'=>'admin-change-email']);
   Route::post('/change-password', ['middleware'=>'admin-not-login','uses'=>'AdminController@changePassword', 'as'=>'admin-change-password']);
 //////////////////////////Books categories/////////////////////////////
  Route::get('/categories', ['middleware'=>'admin-not-login','uses'=>'Admin\BookCategoriesController@index', 'as'=>'admin-book-categories']);
  Route::any('/admin-add-category', ['middleware'=>'admin-not-login','uses'=>'Admin\BookCategoriesController@add', 'as'=>'admin-add-book-category']);
  Route::any('/admin-update-category/{id}', ['middleware'=>'admin-not-login','uses'=>'Admin\BookCategoriesController@update', 'as'=>'admin-update-book-category']) ->where('id', '[0-9]+');
  Route::get('/admin-delete-category/{id}', ['middleware'=>'admin-not-login','uses'=>'Admin\BookCategoriesController@delete', 'as'=>'admin-delete-book-category']) ->where('id', '[0-9]+');
 //////////////////////////Books writers/////////////////////////////
  Route::get('writers', ['middleware'=>'admin-not-login','uses'=>'Admin\BookWritersController@index', 'as'=>'admin-book-writers']);
  Route::any('writer/add', ['middleware'=>'admin-not-login','uses'=>'Admin\BookWritersController@add', 'as'=>'admin-add-book-writer']);
  Route::any('writer/update/{id}', ['middleware'=>'admin-not-login','uses'=>'Admin\BookWritersController@update', 'as'=>'admin-update-book-writer']) ->where('id', '[0-9]+');
  Route::get('writer/delete/{id}', ['middleware'=>'admin-not-login','uses'=>'Admin\BookWritersController@delete', 'as'=>'admin-delete-book-writer']) ->where('id', '[0-9]+');

 //////////////////////////Books/////////////////////////////
  Route::get('/books', ['middleware'=>'admin-not-login','uses'=>'Admin\BooksController@index', 'as'=>'admin-books']);
  Route::any('books/add', ['middleware'=>'admin-not-login','uses'=>'Admin\BooksController@add', 'as'=>'admin-add-book']);
  Route::any('book/update/{id}', ['middleware'=>'admin-not-login','uses'=>'Admin\BooksController@update', 'as'=>'admin-update-book']) ->where('id', '[0-9]+');
  Route::get('book/delete/{id}', ['middleware'=>'admin-not-login','uses'=>'Admin\BooksController@delete', 'as'=>'admin-delete-book']) ->where('id', '[0-9]+'); 
   //////////////////////////Alims/////////////////////////////
  Route::get('/alims', ['middleware'=>'admin-not-login','uses'=>'Admin\AlimsController@index', 'as'=>'admin-alims']);
  Route::any('alim/add', ['middleware'=>'admin-not-login','uses'=>'Admin\AlimsController@add', 'as'=>'admin-add-alim']);
  Route::get('alim/delete/{id}', ['middleware'=>'admin-not-login','uses'=>'Admin\AlimsController@delete', 'as'=>'admin-delete-alim']) ->where('id', '[0-9]+'); 
  //////////////////////////video categories/////////////////////////////
  Route::get('/video-categories', ['middleware'=>'admin-not-login','uses'=>'Admin\VideoCategoriesController@index', 'as'=>'admin-video-categories']);
  Route::any('/admin-add-video-category', ['middleware'=>'admin-not-login','uses'=>'Admin\VideoCategoriesController@add', 'as'=>'admin-add-video-category']);
  Route::any('/admin-update-video-category/{id}', ['middleware'=>'admin-not-login','uses'=>'Admin\VideoCategoriesController@update', 'as'=>'admin-update-video-category']) ->where('id', '[0-9]+');
  Route::get('/admin-delete-video-category/{id}', ['middleware'=>'admin-not-login','uses'=>'Admin\VideoCategoriesController@delete', 'as'=>'admin-delete-video-category']) ->where('id', '[0-9]+');

 //////////////////////////videos/////////////////////////////
  Route::get('/videos', ['middleware'=>'admin-not-login','uses'=>'Admin\VideosController@index', 'as'=>'admin-videos']);
  Route::any('video/add', ['middleware'=>'admin-not-login','uses'=>'Admin\VideosController@add', 'as'=>'admin-add-video']);
  Route::any('video/update/{id}', ['middleware'=>'admin-not-login','uses'=>'Admin\VideosController@update', 'as'=>'admin-update-video']) ->where('id', '[0-9]+');
  Route::get('video/delete/{id}', ['middleware'=>'admin-not-login','uses'=>'Admin\VideosController@delete', 'as'=>'admin-delete-video']) ->where('id', '[0-9]+'); 
   //////////////////////////Alims/////////////////////////////
  Route::get('/alims', ['middleware'=>'admin-not-login','uses'=>'Admin\AlimsController@index', 'as'=>'admin-alims']);
  Route::any('alim/add', ['middleware'=>'admin-not-login','uses'=>'Admin\AlimsController@add', 'as'=>'admin-add-alim']);
  Route::get('alim/delete/{id}', ['middleware'=>'admin-not-login','uses'=>'Admin\AlimsController@delete', 'as'=>'admin-delete-alim']) ->where('id', '[0-9]+'); 
});


Route::group(array('prefix' => 'alim'), function () {
  Route::get('/', ['middleware'=>'alim-loggedin','uses'=>'AlimsController@index', 'as'=>'alim-login']);
  Route::get('/dashboard', ['middleware'=>'alim-not-login','uses'=>'AlimsController@dashboard', 'as'=>'alim-dashboard']);
  Route::post('authenticate',array('as' => 'alim-authenticate', 'uses'=>'AlimsController@authenticate'));
  Route::get('/logout', ['middleware'=>'alim-not-login','uses'=>'AlimsController@logout', 'as'=>'alim-logout']);

   //////////////////////////Books/////////////////////////////
  Route::get('/books', ['middleware'=>'alim-not-login','uses'=>'Alim\BooksController@index', 'as'=>'alim-books']);
  Route::any('books/add', ['middleware'=>'alim-not-login','uses'=>'Alim\BooksController@add', 'as'=>'alim-add-book']);
  Route::any('book/update/{id}', ['middleware'=>'alim-not-login','uses'=>'Alim\BooksController@update', 'as'=>'alim-update-book']) ->where('id', '[0-9]+');
  Route::get('book/delete/{id}', ['middleware'=>'alim-not-login','uses'=>'Alim\BooksController@delete', 'as'=>'alim-delete-book']) ->where('id', '[0-9]+'); 
    //////////////////////////Videos/////////////////////////////
  Route::get('/videos', ['middleware'=>'alim-not-login','uses'=>'Alim\VideosController@index', 'as'=>'alim-videos']);
  Route::any('videos/add', ['middleware'=>'alim-not-login','uses'=>'Alim\VideosController@add', 'as'=>'alim-add-video']);
  Route::any('video/update/{id}', ['middleware'=>'alim-not-login','uses'=>'Alim\VideosController@update', 'as'=>'alim-update-video']) ->where('id', '[0-9]+');
  Route::get('video/delete/{id}', ['middleware'=>'alim-not-login','uses'=>'Alim\VideosController@delete', 'as'=>'alim-delete-video']) ->where('id', '[0-9]+'); 

});


/*******************FrontEnd Routes******************/
Route::get('/', ['uses'=>'Frontend\HomeController@index', 'as'=>'home']);
/************* Books Portion *********/
Route::get('/books', ['uses'=>'Frontend\BooksController@index', 'as'=>'books']);
Route::get('/books/category/{id}', ['uses'=>'Frontend\BooksController@booksByCategory', 'as'=>'by-category'])->where('id', '[0-9]+');
Route::get('/books/writer/{id}', ['uses'=>'Frontend\BooksController@booksByWriter', 'as'=>'by-writer'])->where('id', '[0-9]+');
Route::get('/book/detail/{id}', ['uses'=>'Frontend\BooksController@bookDetails', 'as'=>'book-detail'])->where('id', '[0-9]+');


Route::post('/register-user', ['uses'=>'Frontend\UsersController@register', 'as'=>'register-user']);
Route::post('/user_exist', ['uses'=>'Frontend\UsersController@userExist', 'as'=>'user-exist']);
Route::post('/user_login', ['uses'=>'Frontend\UsersController@userLogin', 'as'=>'user-login']);
Route::get('/user/logout', ['middleware'=>'user-not-login','uses'=>'Frontend\UsersController@logout', 'as'=>'user-logout']);
Route::get('/email-verification/{token}', ['uses'=>'Frontend\UsersController@verification', 'as'=>'email-verification']);

Route::post('/submit_comment', ['uses'=>'Frontend\BookCommentsController@submitComment', 'as'=>'submit_comment']);

/******************Admin Password Reset****************************/
Route::post('admin/password/email','Admin\PasswordController@sendResetLinkEmail');
Route::post('admin/password/reset',['uses'=>'Admin\PasswordController@reset', 'as'=>'admin-forget-password']);
Route::get('admin/password/reset/{token?}','Admin\PasswordController@showResetForm');
Route::auth();

Route::get('/home', 'HomeController@index');
