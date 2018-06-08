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
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('queue');
});

Route::post('/reserveCab', 'QueueController@reserveCab');

// Route::get('/manage', function(){
//     return view('manage.index');
// });

Route::resource('manage', 'ManageController');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
