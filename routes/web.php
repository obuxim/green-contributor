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

// Admin Routes
Route::prefix('dashboard')->group(function(){
    // Sliders
    Route::prefix('sliders')->group(function(){
        // Show All
        Route::get('/', 'SlidersController@index')->name('dashboard.sliders.index');
        // Show Create Form
        Route::get('/new', 'SlidersController@create')->name('dashboard.sliders.create');
        // Handle Create Form
        Route::post('/new', 'SlidersController@store')->name('dashboard.sliders.store');
        // Show Edit Form
        Route::get('/edit/{id}', 'SlidersController@edit')->name('dashboard.sliders.edit');
        // Handle Edit Form
        Route::post('/edit/{id}', 'SlidersController@update')->name('dashboard.sliders.update');
        // Show Individual
        Route::get('/show/{id}', 'SlidersController@show')->name('dashboard.sliders.show');
        // Delete
        Route::get('/delete/{id}', 'SlidersController@destroy')->name('dashboard.sliders.destroy');
    });
    // Video Categories
    Route::prefix('videocategories')->group(function(){
        // Show All
        Route::get('/', 'VideocategoriesController@index')->name('dashboard.videocategories.index');
        // Show Create Form
        Route::get('/new', 'VideocategoriesController@create')->name('dashboard.videocategories.create');
        // Handle Create Form
        Route::post('/new', 'VideocategoriesController@store')->name('dashboard.videocategories.store');
        // Show Edit Form
        Route::get('/edit/{id}', 'VideocategoriesController@edit')->name('dashboard.videocategories.edit');
        // Handle Edit Form
        Route::post('/edit/{id}', 'VideocategoriesController@update')->name('dashboard.videocategories.update');
        // Show Individual
        Route::get('/show/{id}', 'VideocategoriesController@show')->name('dashboard.videocategories.show');
        // Delete
        Route::get('/delete/{id}', 'VideocategoriesController@destroy')->name('dashboard.videocategories.destroy');
    });
    // Events
    Route::prefix('events')->group(function(){
        // Show All
        Route::get('/', 'EventsController@index');
        // Show Create Form
        Route::get('/new', 'EventsController@create');
        // Handle Create Form
        Route::post('/new', 'EventsController@store');
        // Show Edit Form
        Route::get('/edit/{id}', 'EventsController@edit');
        // Handle Edit Form
        Route::post('/edit/{id}', 'EventsController@update');
        // Show Individual
        Route::get('/show/{id}', 'EventsController@show');
        // Delete
        Route::get('/delete/{id}', 'EventsController@destroy');
    });
    // Videos
    Route::prefix('videos')->group(function(){
        // Show All
        Route::get('/', 'VideosController@index')->name('dashboard.videos.index');
        // Show Create Form
        Route::get('/new', 'VideosController@create')->name('dashboard.videos.create');
        // Handle Create Form
        Route::post('/new', 'VideosController@store')->name('dashboard.videos.store');
        // Show Edit Form
        Route::get('/edit/{id}', 'VideosController@edit')->name('dashboard.videos.edit');
        // Handle Edit Form
        Route::post('/edit/{id}', 'VideosController@update')->name('dashboard.videos.update');
        // Show Individual
        Route::get('/show/{id}', 'VideosController@show')->name('dashboard.videos.show');
        // Delete
        Route::get('/delete/{id}', 'VideosController@destroy')->name('dashboard.videos.destroy');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
