<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::post('/follow/{user}', 'FollowController@store')->name('follow.update');

Route::Resource('/posts', 'PostsController');

Route::get('/welcome', 'PostsController@index');
Route::get('/settings', 'PostsController@settings');
Route::get('/profile/{userid}', 'ProfilesController@index')->name('profile.index');
Route::get('/profile/{userid}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{userid}/edit', 'ProfilesController@update')->name('profile.update');