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

});
