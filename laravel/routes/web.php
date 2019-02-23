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

Route::get('/', 'HomepageController@index')->name('app_homepage');

Route::get('/articles', 'ArticleController@index')->name('app_article_list');
Route::get('/articles/create', 'ArticleController@create')->name('app_article_add');
Route::get('/articles/{article}', 'ArticleController@show')->name('app_article');
Route::post('/articles', 'ArticleController@store')->name('app_article_store');
Route::get('/articles/{article}/edit', 'ArticleController@edit')->name('app_article_edit');
Route::patch('/articles/{article}', 'ArticleController@update')->name('app_article_update');
Route::delete('/articles/{article}', 'ArticleController@destroy')->name('app_article_delete');

Route::get('/categories', 'CategoryController@index')->name('app_category_list');
Route::get('/categories/create', 'CategoryController@create')->name('app_category_add');
Route::get('/categories/{category}', 'CategoryController@show')->name('app_category');
Route::post('/categories', 'CategoryController@store')->name('app_category_store');
Route::get('/categories/{category}/edit', 'CategoryController@edit')->name('app_category_edit');
Route::patch('/categories/{category}', 'CategoryController@update')->name('app_category_update');
Route::delete('/categories/{category}', 'CategoryController@destroy')->name('app_category_delete');

Auth::routes();

