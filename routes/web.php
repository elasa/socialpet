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

// Route::get('/', function () {
// 	return view('welcome');
// });

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
	Route::get('/wall/{id}', 'WallController@publication')->name('wall.id');
	Route::post('/main', 'MainController@store')->name('main.store');
	Route::resource('/publications', 'PublicationController');
	Route::resource('/comments', 'CommentController');
	Route::resource('/profile', 'ProfileController');
	Route::resource('/', 'MainController');
//Route::post('comments/{comment}', 'CommentController@show')->name('comments.show');

});

// Routes login social network
Route::get('login/{provider}', 'LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'LoginController@handleProviderCallback');






