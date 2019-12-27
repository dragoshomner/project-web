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

Route::get('/', 'BlogController@index')->name('home');

Route::get('/contribuie', 'ArticleController@create')->name('article.create');
Route::post('/contribuie', 'ArticleController@store');

Route::group(['middleware' => ['auth']], function () {
    Route::get('admin', 'ArticleController@index')->name('article.index');

    Route::get('admin/article/content/{id}', 'ArticleController@getContent')->name('article.getContent');
    Route::post('admin/article/create', 'ArticleController@createAdmin')->name('article.createAdmin');
    Route::put('admin/article/approve/{id}', 'ArticleController@approve')->name('article.approve');
    Route::delete('admin/article/delete/{id}', 'ArticleController@destroy')->name('article.destroy');
});


Auth::routes();
