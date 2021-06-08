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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/folders/{id}/tasks', 'TaskController@index')
->name('tasks.index');

// フォルダ作成
Route::get('/folders/create', 'FolderController@create')->name('folders.create');
Route::post('/folders/create', 'FolderController@store')->name('folders.store');

Route::get('/folders/{id}/tasks/create', 'TaskController@create')->name('tasks.create');
Route::post('/folders/{id}/tasks/store', 'TaskController@store')->name('tasks.store');
