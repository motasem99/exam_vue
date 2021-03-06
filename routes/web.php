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

Route::get('/', 'HumanController@index');
Route::get('/add', 'HumanController@addPage');
Route::get('/get_users', 'HumanController@getData');
Route::post('/edit_user/{id}', 'HumanController@updateData');
Route::post('add_user','HumanController@add_user');
