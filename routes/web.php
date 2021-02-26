<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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


//Route::get('image-upload', 'ImageController@imageUpload')->name('image.upload');
Route::post('images/{id}', 'ImageController@imageUploadPost')->name('image.upload.post'); 





/*Route::Get('/upload','UploadController@uploadForm');

Route::PUT('/upload','UploadController@uploadFile')->name('uploadfile');
 
/*Route::PUT('/upload', function (Request $request)
{  
    $request->image->store('images');
    return 'uploadedddddd';
  //dd( $request->hasFile('image'));
});
/*Route::get('Upload','UploadController@index')->name('Upload');
/*Route::get('/test/env', function () {
    dd(env('DB_PASSWORD')); // dump db variable value one by one
});*/
