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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/magazine', 'MagazineController@overview');
Route::get('/magazine/{id}', 'MagazineController@read');
Route::post('/magazine/{id}/comments', 'CommentController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
