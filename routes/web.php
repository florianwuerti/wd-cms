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

	Route::get( '/posts/{id}/trash', 'PostController@toTrash' )->name( 'posts.totrash' );
	Route::get( '/posts/drafts', 'PostController@drafts' )->name( 'posts.drafst' );
	Route::get( '/posts/trash', 'PostController@trash' )->name( 'posts.trash' );
	Route::get( '/posts/published', 'PostController@published' )->name( 'posts.published' );
	Route::get( '/posts/{id}/delete', 'PostController@delete' )->name( 'posts.delete' );
	Route::get( '/posts/{id}/restore', 'PostController@restore' )->name( 'posts.restore' );

	// Tags
	Route::resource( '/tags', 'TagController' );

	// Categories
	Route::resource( 'categories', 'CategoryController' );

	// Post
	Route::resource( '/posts', 'PostController' );

	// Pages
	Route::resource( '/pages', 'PageController' );

} );
