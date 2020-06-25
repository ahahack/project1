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

Auth::routes();

// Public area

Route::get('/', 'InternalsController@home');
Route::get('home', 'InternalsController@home');
Route::get('about', 'InternalsController@about');

Route::resource('articles', 'ArticlesController', ['except' => ['create', 'update', 'store', 'delete']]);
Route::resource('categories', 'CategoriesController', ['except' => ['create', 'update', 'store', 'delete']]);
Route::resource('tags', 'TagsController', ['except' => ['create', 'update', 'store', 'delete']]);
Route::resource('projects', 'ProjectsController', ['except' => ['create', 'update', 'store', 'delete']]);
Route::resource('services', 'ServicesController', ['except' => ['create', 'update', 'store', 'delete']]);

Route::get('contact', 'ContactFormController@create');
Route::post('contact', 'ContactFormController@store');

Route::group([
	'prefix' => 'laravel-filemanager',
	'middleware' => ['web', 'auth', 'can:admin-area']],
	function () {
		\UniSharp\LaravelFilemanager\Lfm::routes();
	}
);

// Admin area

Route::namespace ('Admin')->prefix('admin')->name('admin.')->middleware('can:admin-area')->group(function () {

	Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
	Route::resource('/articles', 'ArticlesController');
	Route::resource('/categories', 'CategoriesController');
	Route::resource('/tags', 'TagsController');
	Route::resource('/projects', 'ProjectsController');
	Route::resource('/services', 'ServicesController');

});