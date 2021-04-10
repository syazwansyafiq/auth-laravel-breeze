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

Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::group(['middleware' => 'auth'], function() {
    //All the routes that belongs to the group goes here
    Route::get('/dashboard', 'App\Http\Controllers\HomeController@dashboard')->name('dashboard');
    Route::get('/users', 'App\Http\Controllers\Modules\UserController@index')->name('users');
    Route::get('/users/{id}/edit', 'App\Http\Controllers\Modules\UserController@edit')->name('users.edit');
    Route::put('/users/{id}/update', 'App\Http\Controllers\Modules\UserController@update')->name('users.update');
    Route::get('/users/create', 'App\Http\Controllers\Modules\UserController@create')->name('users.create');
    Route::post('/users/store', 'App\Http\Controllers\Modules\UserController@store')->name('users.store');
    Route::get('/users/{id}/delete', 'App\Http\Controllers\Modules\UserController@delete')->name('users.delete');


});

require __DIR__.'/auth.php';
