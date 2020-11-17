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
})->name('home');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//admin panel routes
Route::group(['prefix' => 'admin','middleware' => ['auth']],function (){
    Route::get('/home',function (){
        return view('admin.dashboard.index');
    })->name('dashboard');

    Route::resource('category','Category\CategoryController');
    Route::resource('type','Type\TypeController');
    Route::resource('story','Story\StoryController');
    Route::resource('chapter','Chapter\ChapterController');
    Route::resource('tag','Tag\TagController');
    Route::get('/update-profile/{id}','User\UserController@edit')->name('update-profile');
    Route::put('/update-profile/{id}','User\UserController@update')->name('user-update');
});
