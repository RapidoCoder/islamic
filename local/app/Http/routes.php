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
 //////////////////////////Books categories/////////////////////////////
   Route::get('/categories', ['middleware'=>'admin-not-login','uses'=>'Admin\BookCategoriesController@index', 'as'=>'admin-book-categories']);
   Route::any('/admin-add-category', ['middleware'=>'admin-not-login','uses'=>'Admin\BookCategoriesController@add', 'as'=>'admin-add-book-category']);
   Route::any('/admin-update-category/{id}', ['middleware'=>'admin-not-login','uses'=>'Admin\BookCategoriesController@update', 'as'=>'admin-update-book-category']) ->where('id', '[0-9]+');
   Route::get('/admin-delete-category/{id}', ['middleware'=>'admin-not-login','uses'=>'Admin\BookCategoriesController@delete', 'as'=>'admin-delete-book-category']) ->where('id', '[0-9]+');
 
 //////////////////////////Books/////////////////////////////
   Route::get('/books', ['middleware'=>'admin-not-login','uses'=>'Admin\BooksController@index', 'as'=>'admin-books']);
   Route::any('books/add', ['middleware'=>'admin-not-login','uses'=>'Admin\BooksController@add', 'as'=>'admin-add-book']);
   Route::any('book/update/{id}', ['middleware'=>'admin-not-login','uses'=>'Admin\BooksController@update', 'as'=>'admin-update-book']) ->where('id', '[0-9]+');
   Route::get('book/delete/{id}', ['middleware'=>'admin-not-login','uses'=>'Admin\BooksController@delete', 'as'=>'admin-delete-book']) ->where('id', '[0-9]+'); 
});
