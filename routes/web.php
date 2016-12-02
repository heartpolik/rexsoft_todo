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
Route::GET('/showCategories', 'CategoriesController@renderCatList');

Route::GET('/deleteCategory', 'CategoriesController@destroy');

Route::POST('/createCategory', 'CategoriesController@create');

Route::POST('/createTask', 'TasksController@create');

Route::GET('/showTasks','TasksController@renderTaskList');

Route::GET('/deleteTask', 'TasksController@destroy');

Route::GET('/toggleTaskStatus', 'TasksController@toggleStatus');


Route::get('/', function () {
    return view('index');
});
