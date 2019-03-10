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

Route::get('/', 'PagesController@index')->name('root');
Route::get('/contact', 'PagesController@contact')->name('contact')->middleware('auth');
Route::get('/about', 'PagesController@about')->name('about');

//Rutas para la entidad compiuters
Route::resource('/computers','ComputersController');
Route::resource('/components','ComponentsController');

    Auth::routes();

 Route::get('/users/{user}/computers', 'UserComputersController@index')->name('usercomputers.index');