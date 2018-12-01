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

Route::get('/', 'LecturerController@create');

Route::get('/lecturer_details', 'LecturerController@index');

Route::resource('Lecturer', 'LecturerController');

Route::get('/generate_csv', 'LecturerController@generateCsv');
