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

Route::get('/','WelcomeController@index');
Route::get('/portfolio','WelcomeController@portfolio');
Route::get('/service','WelcomeController@service');
Route::get('/contact','WelcomeController@contact');



//admin site are here
Route::get('/backend','AdminController@index');
Route::post('/admin-login-check','AdminController@admin_login_check');
//super admin are here
Route::get('/dashboard','SuperAdminController@index');
Route::get('/add-category','SuperAdminController@add_category');
Route::get('/manage-category','SuperAdminController@manage_category');
//published and unpublished record with icon
Route::get('/unpublished-category/{id}','SuperAdminController@unpublished_category');
Route::get('/published-category/{id}','SuperAdminController@published_category');
//end published and unpublished
Route::post('/save-category','SuperAdminController@save_category');
Route::post('/save-blog','SuperAdminController@save_blog');
Route::get('/delete-category/{id}','SuperAdminController@delete_category');
Route::post('/update-category/','SuperAdminController@update_category');
Route::get('/edit-category/{id}','SuperAdminController@edit_category');
//blog setions routes are here
Route::get('/manage-blog','SuperAdminController@manage_blog');
Route::get('/add-blog','SuperAdminController@add_blog');
Route::get('/blog-details/{id}','WelcomeController@blog_details');
Route::get('/logout','SuperAdminController@logout');
Auth::routes();

Route::get('/home', 'HomeController@index');

