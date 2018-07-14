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

Route::get('/', 'questionController@start')->name('start');

Auth::routes();

Route::get('/questions/show/{id}', 'questionController@show')->name('show');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/questions/show/{id}', 'questionController@show')->name('show');
Route::get('/questions/create', 'questionController@create')->name('create');
Route::get('/edit/{id}', 'questionController@edit')->name('edit');
Route::post('/questions/store', 'questionController@store')->name('store');
Route::post('/storecategory', 'questionController@storecategory')->name('storecategory');

Route::get('/questions/list', 'questionController@list')->name('list');
Route::get('/questions/categories', 'questionController@indexcategories')->name('indexcategories');

Route::get('/questions/{channel}/list', 'questionController@listchannel')->name('listchannel');

Route::patch('/updatecounter/{id}', 'questionController@updatecounter')->name('updatecounter');
Route::delete('/delete/{question}', function (Question $question) {
    $question->delete();
    return route('home');
});
Route::patch('/update/{id}', 'questionController@update')->name('update');
Route::get('/questions/{channel}/start', 'questionController@startchannel')->name('startchannel');
