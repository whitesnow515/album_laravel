<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', 'WelcomeController@index');

Auth::routes(['register' => false]);
// Auth::routes();

Route::get('/myalbum', 'AlbumsController@index')->middleware('guest')->name("myalbum");
Route::get('/albums/{id}', 'AlbumsController@show')->name("myalbum.show");
Route::get('/albums/delete/{id}', 'AlbumsController@delete')->middleware('guest')->name("myalbum.delete");
Route::resource('albums','AlbumsController')->middleware('guest');

Route::post('/album/share/create', 'ShareController@store')->middleware('guest');
Route::get('/album/share/{id}', 'ShareController@show');

Route::get('/photos/create/{id}', 'PhotosController@create')->middleware('guest');
Route::get('/photos/show/{id}', 'PhotosController@show')->name('photos.show');
Route::post('/photos/store', 'PhotosController@store')->middleware('guest');
Route::delete('/photos/{id}', 'PhotosController@destroy')->middleware('guest');

Route::get('/users', 'UserController@index');
Route::get('/users/destory/{id}', 'UserController@delete')->name('users.destory')->middleware('guest');
Route::get('/users/allow/{id}', 'UserController@allow')->name('users.allow')->middleware('guest');
Route::post('/users/update', 'UserController@update')->name('users.update')->middleware('guest');
Route::post('/users/changepw', 'UserController@changePw')->middleware('guest');

Route::post('/profiles/store', 'ProfileController@store')->middleware('guest');
Route::post('/profiles/show/{id}', 'ProfileController@show')->name('profiles.show')->middleware('guest');

Route::get('/home', 'AlbumsController@index')->name('home');

Route::get('/clear-cookie', 'CookieController@clearCookie');