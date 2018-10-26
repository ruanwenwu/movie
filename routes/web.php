<?php

use App\Http\Controllers\IndexController;
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

Route::get('/', 'IndexController@Index');
Route::get('/{cate}.html','IndexController@Lists');
Route::get('/{cate}/p_{page}.html','IndexController@Lists');
Route::get('/search/{keyword}/p_{page}.html','IndexController@Search');
Route::get('/search/{keyword}.html','IndexController@Search');
Route::get('/{cate}/{id}','IndexController@Detail');
Route::get('/search','IndexController@Search');


