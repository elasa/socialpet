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

//Solo administradores
Route::middleware(['admin'])->group(function () {

	Route::resource('/roles', 'RoleController');
	Route::resource('/users', 'UserController');
	Route::resource('/types', 'TypeController');

});

//Todos los usuarios logueados
Route::middleware(['user'])->group(function () {

	Route::resource('/pets', 'PetController');

	Route::get('/wall', 'WallController@index');
	Route::resource('/publications', 'PublicationController');
	Route::resource('/comments', 'CommentController');
//Route::post('comments/{comment}', 'CommentController@show')->name('comments.show');



});






