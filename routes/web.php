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

Route::get('/welcome', 'SaludoController@index');

Route::get('api/roles', function(){
    return App\Role::all();
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
	Route::get('/wall/{id}', 'WallController@publication')->name('wall.id');
	Route::post('/main', 'MainController@store')->name('main.store');
	Route::get('/main/{publication}', 'MainController@destroy')->name('main.destroy');
	Route::get('/main/{publication}/edit', 'MainController@edit')->name('main.edit');
	Route::put('/main/{publication}', 'MainController@update')->name('main.update');
	Route::resource('/publications', 'PublicationController');

	Route::resource('/profile', 'ProfileController');
	Route::resource('/', 'MainController');

	Route::post('/comment', 'CommentController@store')->name('comments.store');
	Route::get('/comment/{comment}', 'CommentController@show')->name('comments.show');
	Route::delete('/comment/{comment}', 'CommentController@destroy')->name('comments.destroy');

	Route::get('/likes/{user}','LikeController@like')->name('likes');

});

// Routes login social network
Route::get('login/{provider}', 'LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'LoginController@handleProviderCallback');








