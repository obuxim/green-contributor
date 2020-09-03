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
Route::get('/home', 'HomeController@index')->name('home');
// Dashboard routes
Route::middleware('auth')->prefix('/dashboard')->group(function(){
    Route::get('/', function(){
        return view('home');
    });
    // Teacher
    Route::prefix('teachers')->group(function(){
        Route::get('/', 'TeachersController@index')->name('teacher.index');
        Route::get('/new', 'TeachersController@create')->name('teacher.create');
        Route::post('/new', 'TeachersController@store')->name('teacher.store');
        Route::get('/edit/{id}', 'TeachersController@edit')->name('teacher.edit');
        Route::post('/edit/{id}', 'TeachersController@update')->name('teacher.update');
        Route::get('/delete/{id}', 'TeachersController@destroy')->name('teacher.destroy');
    });
    // City
    Route::prefix('cities')->group(function(){
        Route::get('/', 'CitiesController@index')->name('cities.index');
        Route::get('/new', 'CitiesController@create')->name('cities.create');
        Route::post('/new', 'CitiesController@store')->name('cities.store');
        Route::get('/edit/{id}', 'CitiesController@edit')->name('cities.edit');
        Route::post('/edit/{id}', 'CitiesController@update')->name('cities.update');
        Route::get('/delete/{id}', 'CitiesController@destroy')->name('cities.destroy');
    });
    // Event
    Route::prefix('events')->group(function(){
        Route::get('/', 'EventsController@index')->name('events.index');
        Route::get('/new', 'EventsController@create')->name('events.create');
        Route::post('/new', 'EventsController@store')->name('events.store');
        Route::get('/edit/{id}', 'EventsController@edit')->name('events.edit');
        Route::post('/edit/{id}', 'EventsController@update')->name('events.update');
        Route::get('/delete/{id}', 'EventsController@destroy')->name('events.destroy');
    });
    // Activities
    Route::prefix('activities')->group(function(){
        Route::get('/', 'ActivitiesController@index')->name('activities.index');
        Route::get('/new', 'ActivitiesController@create')->name('activities.create');
        Route::post('/new', 'ActivitiesController@store')->name('activities.store');
        Route::get('/edit/{id}', 'ActivitiesController@edit')->name('activities.edit');
        Route::post('/edit/{id}', 'ActivitiesController@update')->name('activities.update');
        Route::get('/delete/{id}', 'ActivitiesController@destroy')->name('activities.destroy');
    });
});
