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

Route::resource('blogs','BlogController');
// Route::resource('images','ImageController');
Route::Get('/images/{id}','ImageController@index')->name('ImagesIndex');


Route::get('/test/env', function () {
    dd(env('DB_PASSWORD')); // dump db variable value one by one
});
