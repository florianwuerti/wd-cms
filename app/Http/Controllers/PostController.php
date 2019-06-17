<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;
use Session;

class PostController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$posts = Post::orderBy( 'id', 'desc' )->paginate( 20 );

		return view( 'manage.posts.index', compact( 'posts' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view( 'manage.posts.create' );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {

		$validatedData = $request->validate( [
			'post_title'     => 'required|min:5|max:255',
			'post_content'   => 'required|min:5|max:255',
			'post_thumbnail' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
		] );

		$post               = new Post();
		$post->post_title   = $request->post_title;
		$post->post_content = $request->post_content;
		$post->post_type    = 'posts';
		$post->author_id    = Auth::user()->id;
		$post->published_at = Carbon::now();

		if ( $request->hasFile( 'post_thumbnail' ) ) {

			// Get image file
			$image = $request->file( 'post_thumbnail' );

			$filename = $image->getClientOriginalName();

			$location = public_path( '/uploads/images/' . $filename );

			Image::make( $image->getRealPath() )->save( $location );

			$post->image = $filename;
		};

		$post->save();

		return redirect()->route( 'posts.show', $post->id );


	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {

		$post = Post::findOrFail( 'id', $id );

		return view( 'manage.posts.show', compact( 'post' ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {

		$post = Post::findOrFail( $id );

		return view( 'manage.posts.edit', compact( 'post' ) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $id ) {

		$validatedData = $request->validate( [
			'post_title'   => 'required|max:255',
			'post_content' => 'max:255',
			'image'        => 'image|mimes:jpeg,png,jpg,svg|max:2048'

		] );

		$post               = Post::findOrFail( $id );
		$post->post_title   = $request->post_title;
		$post->post_content = $request->post_content;

		if ( $request->hasFile( 'image' ) ) {

			// Get image file
			$image = $request->file( 'image' );

			$filename = $image->getClientOriginalName();

			$location = public_path( '/uploads/images/' . $filename );

			Image::make( $image->getRealPath() )->save( $location );

			$post->post_thumbnail = $filename;
		};

		$post->save();


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {
		//
	}
}
