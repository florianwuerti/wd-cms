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

###### Frontend Routes ######

Route::get( '/', 'Frontend\PageController@start' )->name( 'home' );
Route::get( 'login', 'Backend\ManageController@login' )->name( 'login' );

Route::get( 'password/reset/{token}', 'Auth\ResetPasswordController@getReset' );
Route::post( 'password/reset', 'Auth\ResetPasswordController@postReset' )->name( 'password.request' );

// Pages
Route::get( '{pages}', 'Frontend\PageController@getPages' )->name('frontend.pages');
Route::get( '{page}', 'Frontend\PageController@getPage' )->name('frontend.page');

//Posts
Route::get( 'blog/{post}', 'Frontend\PostController@getPost' )->name('frontend.posts.single');

// Contact
Route::post( 'contact', 'Backend\MailController@sendContactToAdmin' )->name('frontend.contact.sendMassage');


###### Backend Routes ######

Auth::routes();

Route::prefix( 'manage' )->group( function () {

	Route::get( '/', 'Backend\ManageController@index' );
	Route::get( '/dashboard', 'Backend\ManageController@index' )->name( 'manage.dashboard' );
	Route::get( '/logout', 'Backend\UserController@logout' )->name( 'manage.logout' );

	// User
	Route::resource( '/users', 'Backend\UserController' );

	Route::get( '/posts/{id}/trash', 'Backend\PostController@toTrash' )->name( 'manage.posts.totrash' );
	Route::get( '/posts/drafts', 'Backend\PostController@drafts' )->name( 'manage.posts.drafst' );
	Route::get( '/posts/trash', 'Backend\PostController@trash' )->name( 'manage.posts.trash' );
	Route::get( '/posts/published', 'Backend\PostController@published' )->name( 'manage.posts.published' );
	Route::get( '/posts/{id}/delete', 'Backend\PostController@delete' )->name( 'manage.posts.delete' );
	Route::get( '/posts/{id}/restore', 'Backend\PostController@restore' )->name( 'manage.posts.restore' );

	// Tags
	Route::resource( '/tags', 'Backend\TagController' );

	// Categories
	Route::resource( 'categories', 'Backend\CategoryController' );

	// Post
	Route::resource( '/posts', 'Backend\PostController' );

	// Pages
	Route::resource( '/pages', 'Backend\PageController' );
	Route::get( '/pages/{id}/trash', 'Backend\PageController@toTrash' )->name( 'manage.pages.totrash' );
	Route::get( '/pages/drafts', 'Backend\PageController@drafts' )->name( 'manage.pages.drafst' );
	Route::get( '/pages/trash', 'Backend\PageController@trash' )->name( 'manage.pages.trash' );
	Route::get( '/pages/published', 'Backend\PageController@published' )->name( 'manage.pages.published' );

	Route::get( '/pages/{id}/trash', 'Backend\PageController@toTrash' )->name( 'manage.pages.totrash' );

	// Settings
	Route::get('/settings', 'Backend\SettingController@index')->name('settings');
	Route::post('/settings', 'Backend\SettingController@store')->name('settings.store');

} );
