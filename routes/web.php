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
//     return view('index');
// });
// Route::get('/about', function () {
//     return view('about');
// });

Route::get('/','AllData@index');
Route::get('/students/trash','AllData@trash');
Route::get('/students/restore','StudentsController@restore_all');
Route::get('/students/restore/{student}','StudentsController@restore');
Route::get('/students/hapus_permanen/{student}','StudentsController@hapus_permanen');
Route::get('/students/hapus_permanen','StudentsController@hapus_permanen_all');
// Route::post('/students/upload','StudentsController@upload');

//Student
// Route::get('/students','StudentsController@index');
// Route::get('/students/create','StudentsController@create');
// Route::get('/students/{student}','StudentsController@show');
// Route::post('/students','StudentsController@store');
// Route::delete('/students/{student}','StudentsController@destroy');
// Route::get('/students/{student}/edit','StudentsController@edit');
// Route::patch('/students/{student}','StudentsController@update');

Route::resource('students','StudentsController');


