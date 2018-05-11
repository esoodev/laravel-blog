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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', 'HomeController@index');
Route::get('/magazine', 'MagazineController@overview');
Route::get('/magazine/search', 'MagazineController@overviewSearch');
Route::get('/magazine/latest', 'MagazineController@readLatest');
Route::get('/magazine/{id}', 'MagazineController@read');
Route::post('/magazine/{id}/comments', 'CommentController@store');
Route::get('/magazine/category/{name}', 'MagazineController@overviewCategory');
Route::get('/magazine/tag/{name}', 'MagazineController@overviewTag');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
