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

Auth::routes();

Route::post('/follow/{user}', 'App\Http\Controllers\followsController@store');

Route::get('/','App\Http\Controllers\PostsController@index');
Route::get('/p/create','App\Http\Controllers\PostsController@create');
Route::post('/p','App\Http\Controllers\PostsController@store');
Route::get('/p/{post}','App\Http\Controllers\PostsController@show');
Route::get('/profile/users','App\Http\Controllers\PostsController@showUsers');

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::post('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');

