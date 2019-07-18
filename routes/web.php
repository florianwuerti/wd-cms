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

Route::get( '/', 'Frontend\PageController@start' )->name( 'home' );
Route::get( '/login', 'Backend\ManageController@login' )->name( 'login' );

Route::get( 'password/reset/{token}', 'Auth\ResetPasswordController@getReset' );
Route::post( 'password/reset', 'Auth\ResetPasswordController@postReset' )->name( 'password.request' );

// Post
//Route::get( '/posts/{id}', 'PostController@show' )->name('post.show');

Auth::routes();


Route::prefix( 'manage' )->group( function () {

	Route::get( '/', 'Backend\ManageController@index' );
	Route::get( '/dashboard', 'Backend\ManageController@index' )->name( 'manage.dashboard' );
	Route::get( '/logout', 'Backend\UserController@logout' )->name( 'manage.logout' );

	// User
	Route::resource( '/users', 'Backend\UserController' );

	Route::get( '/posts/{id}/trash', 'Backend\PostController@toTrash' )->name( 'posts.totrash' );
	Route::get( '/posts/drafts', 'Backend\PostController@drafts' )->name( 'posts.drafst' );
	Route::get( '/posts/trash', 'Backend\PostController@trash' )->name( 'posts.trash' );
	Route::get( '/posts/published', 'Backend\PoBackendControllers/stController@published' )->name( 'posts.published' );
	Route::get( '/posts/{id}/delete', 'PostController@delete' )->name( 'posts.delete' );
	Route::get( '/posts/{id}/restore', 'Backend\PostController@restore' )->name( 'posts.restore' );

	// Tags
	Route::resource( '/tags', 'Backend\TagController' );

	// Categories
	Route::resource( 'categories', 'Backend\CategoryController' );

	// Post
	Route::resource( '/posts', 'Backend\PostController' );

	// Pages
	Route::resource( '/pages', 'Backend\PageController' );

} );
