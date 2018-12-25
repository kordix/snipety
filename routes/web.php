<?php
use App\Question;

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

Route::get('/', 'IndexController@start')->name('start');

Auth::routes();

Route::get('/questions/show/{id}', 'IndexController@show')->name('show');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/questions/show/{id}', 'IndexController@show')->name('show');
Route::get('/questions/create', 'questionController@create')->name('create');
Route::get('/edit/{id}', 'questionController@edit')->name('edit');
Route::post('/questions/store', 'questionController@store')->name('store');
Route::post('/storecategory', 'questionController@storecategory')->name('storecategory');

Route::get('/questions/list', 'questionController@list')->name('list');
Route::get('/questions/categories', 'questionController@indexcategories')->name('categories');

Route::get('/questions/{channel}/list', 'IndexController@listchannel')->name('listchannel');

Route::patch('/updatecounter/{id}', 'questionController@updatecounter')->name('updatecounter');
Route::patch('/updatecounterset/{id}', 'questionController@updatecounterset')->name('updatecounterset');

Route::delete('/delete/{question}', 'questionController@delete')->name('delete');
Route::patch('/update/{id}', 'questionController@update')->name('update');
Route::get('/questions/{channel}/start', 'questionController@startchannel')->name('startchannel');
