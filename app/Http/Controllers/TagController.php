<?php

namespace App\Http\Controllers;

use App\Tag;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TagController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$tags = Tag::orderBy( 'name', 'asc' )->paginate( 20 );

		return view( 'manage.posts.tags.index', compact( 'tags' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
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
			'tag_name' => 'required|min:2|max:255',
			//'tag_description' => 'max:255'
		] );

		$tag       = new Tag();
		$tag->name = $request->tag_name;

		//$tag->description = $request->tag_description;


		if ( empty( $request->tag_slug ) ) {

			$tag->slug = Str::slug( $request->tag_name, '-' );

		} else {

			$tag->slug = Str::slug( $request->tag_slug, '-' );
		}

		$tagSlugExists = Tag::where( 'slug', $tag->slug )->exists();


		if ( $tagSlugExists ) {

			$i = 1;

			$baseSlug = $tag->slug;

			while ( Tag::where( 'slug', $tag->slug )->exists() ) {

				$tag->slug = $baseSlug . "-" . $i ++;

			}
		}


		$tag->save();


		return redirect()->route( 'tags.index' )->with( 'status', 'New tag saved.' );;

	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {

		$tag = Tag::findOrFail( $id );

		return view( 'manage.posts.tags.edit', compact( 'tag' ) );
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

		dd( $request );
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {

		$tag = Tag::findOrFail( $id );

		$tag->delete();

		return redirect()->route( 'tags.index' )->with( 'status', 'Tag is deleted.' );

	}
}
