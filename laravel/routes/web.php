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

Route::get('/article-list', 'ArticleController@index')->name('app_article_list');
Route::get('/article/add', 'ArticleController@add')->name('app_article_add');
Route::get('/article/{id</d+>}', 'ArticleController@detail')->name('app_article');
Route::get('/article/{id</d+>}/edit', 'ArticleController@edit')->name('app_article_edit');
Route::get('/article/{id</d+>}/delete', 'ArticleController@delete')->name('app_article_delete');

Route::get('/category-list', 'CategoryController@index')->name('app_category_list');
Route::get('/category/add', 'CategoryController@add')->name('app_category_add');
Route::get('/category/{id</d+>}', 'CategoryController@detail')->name('app_category');
Route::get('/category/{id</d+>}/edit', 'CategoryController@edit')->name('app_category_edit');
Route::get('/category/{id</d+>}/delete', 'CategoryController@delete')->name('app_category_delete');

Route::get('/sign/in', 'SecurityController@in')->name('app_sign_in');
Route::get('/sign/up', 'SecurityController@up')->name('app_sign_up');
Route::get('/sign/out', 'SecurityController@out')->name('app_sign_out');


Auth::routes();

