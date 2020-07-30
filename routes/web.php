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
// Route::get('/index', 'RestroController@index');
Route::any('/', 'RestroController@index');
Route::any('/index', 'RestroController@index');

Route::group(['middleware' => 'custom.auth'] , function() {
    Route::get('/list', 'RestroController@list');
    Route::get('/add', 'RestroController@add');
    Route::post('/store', 'RestroController@store');
    Route::get('/delete/{id}', 'RestroController@delete');
    Route::get('/edit/{id}', 'RestroController@edit');
    Route::post('/update/{id}', 'RestroController@update');
    Route::view('/register', 'users.register');
    Route::post('/register', 'RestroController@register');
    Route::view('/login', 'users.login');
    Route::post('/login', 'RestroController@login');
    Route::get('/profile', function(){
        return view('/users.profile');
    });

    Route::post('/comment/store/{res_id}', 'CommentsController@store');
});
Route::get('/logout', function(){
    session()->forget('user');
    session()->flush();
    return redirect('/');
});

Route::get('/show/{id}', 'CommentsController@index');
