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

//Auth::routes();

Route::get( '/', 'PageController@index' )->name( 'home' );
Route::get( '/login', 'ManageController@login' )->name( 'login' );

Route::get( 'password/reset/{token}', 'Auth\ResetPasswordController@getReset' );
Route::post( 'password/reset', 'Auth\ResetPasswordController@postReset' )->name( 'password.request' );

// Post
//Route::get( '/posts/{id}', 'PostController@show' )->name('post.show');

Auth::routes();


Route::prefix( 'manage' )->group( function () {

	Route::get( '/', 'ManageController@index' );
	Route::get( '/dashboard', 'ManageController@index' )->name( 'manage.dashboard' );
	Route::get( '/logout', 'UserController@logout' )->name( 'manage.logout' );

	// User
	Route::resource( '/users', 'UserController' );
	// Post
	Route::resource( '/posts', 'PostController' );
	// Pages
	Route::resource( '/pages', 'PageController' );

} );
