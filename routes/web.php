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

Route::middleware(['auth'])->group(function(){
    Route::get('/folders/{id}/tasks', 'TaskController@index')
    ->name('tasks.index');
    
    // フォルダ作成
    Route::get('/folders/create', 'FolderController@create')->name('folders.create');
    Route::post('/folders/create', 'FolderController@store')->name('folders.store');
    
    // フォルダ編集
    Route::get('/folders/{id}/edit', 'FolderController@edit')->name('folders.edit');
    Route::post('/folders/{id}/update', 'FolderController@update')->name('folders.update');
    
    // フォルダ削除
    // Route::get('/folders/{id}/destroy', 'FolderController@destroy')->name('folders.destroy');
    Route::post('/folders/{id}/destroy', 'FolderController@destroy')->name('folders.destroy');

    // タスク作成
    Route::get('/folders/{id}/tasks/create', 'TaskController@create')->name('tasks.create');
    Route::post('/folders/{id}/tasks/store', 'TaskController@store')->name('tasks.store');
    
    // タスク編集
    Route::get('/folders/{id}/tasks/{task_id}/edit', 'TaskController@edit')->name('tasks.edit');
    Route::post('/folders/{id}/tasks/{task_id}/update', 'TaskController@update')->name('tasks.update');
    
    // タスク削除
    Route::post('/folders/{id}/tasks/{task_id}/destroy', 'TaskController@destroy')->name('tasks.destroy');
    

    Route::get('/', 'HomeController@index')->name('home');

});

// 正解↓
// Route::group(['middleware' => 'auth'], function() {

//     Route::get('/folders/{id}/tasks', 'TaskController@index')
//     ->name('tasks.index');
    
//     // フォルダ作成
//     Route::get('/folders/create', 'FolderController@create')->name('folders.create');
//     Route::post('/folders/create', 'FolderController@store')->name('folders.store');
    
//     Route::get('/folders/{id}/tasks/create', 'TaskController@create')->name('tasks.create');
//     Route::post('/folders/{id}/tasks/store', 'TaskController@store')->name('tasks.store');
    
//     // フォルダ編集
    
//     Route::get('/folders/{id}/tasks/{task_id}/edit', 'TaskController@edit')->name('tasks.edit');
//     Route::post('/folders/{id}/tasks/{task_id}/update', 'TaskController@update')->name('tasks.update');
    
//     Route::get('/', 'HomeController@index')->name('home');
// });


Auth::routes();
