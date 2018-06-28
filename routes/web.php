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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::middleware(['auth'])->group(function () {
// Role routes
Route::resource('roles', 'RolesController');


 // company routes
        Route::resource('companies', 'CompaniesController');
Route::get('companies/{id}/show','CompaniesController@show');

// Project routes
        Route::get('projects/create/{company_id?}', 'ProjectsController@create');
        Route::get('projects/{id}/show','ProjectsController@show');

        Route::post('projects/adduser/{project_id?}', 'ProjectsController@adduser')->name('projects.adduser');
        Route::resource('projects', 'ProjectsController');
        Route::get('projects/{id}/delete','ProjectsController@destroy');


// tasks Routes
        Route::resource('tasks', 'TasksController');
        Route::get('tasks/{id}/delete','TasksController@destroy');
Route::get('tasks/{id}/show','TasksController@show');



    //   Comments Routes
        Route::resource('comments', 'CommentsController');
        Route::get('/comments/{id}/delete','CommentsController@destroy');
        Route::get('/comments/{id}/edit','CommentsController@edit');
        Route::get('/comments/{id}/show','CommentsController@show');




// Users(members Routes)
Route::get('/users/create','UsersController@create');
Route::post('/users/store','UsersController@store');
Route::get('users','UsersController@index');
Route::get('/users/{id}/show','UsersController@show');
Route::get('/users/{id}/edit','UsersController@edit');
  Route::resource('users', 'UsersController');
Route::get('/users/{id}/delete','UsersController@destroy');



    });
