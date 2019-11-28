<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Auth
Route::post('register', 'AuthController@register')->name('api.register');
Route::post('login', 'AuthController@login')->name('api.authenticate');
Route::post('logout', 'AuthController@logout');
Route::get('user', 'AuthController@getAuthUser');
Route::get('users', 'AuthController@index');

// Books
Route::apiResource('books', 'BookController');
Route::get('books', 'BookController@index')->name('books.all');
// Ratings
Route::post('books/{book}/ratings', 'RatingController@store')->middleware('auth:api')->name('book.create');

