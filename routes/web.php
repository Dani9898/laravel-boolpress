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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'GuestController@home') -> name('home');
Route::get('/posts/create', 'Homecontroller@createPost') -> name('post.create');
Route::post('/posts/store', 'Homecontroller@storePost') -> name('post.store');

Route::get('/posts/edit/{id}', 'HomeController@editPost') -> name('post.edit');
Route::post('/posts/update/{id}', 'HomeController@updatePost') -> name('post.update');
Route::get('/posts/delete/{id}', 'HomeController@deletePost') -> name('post.delete');

Route::get('/logout', 'Auth\LoginController@logout') -> name('logout');
Route::post('/register', 'Auth\RegisterController@register') -> name('register');
Route::post('/login', 'Auth\LoginController@login') -> name('login');

