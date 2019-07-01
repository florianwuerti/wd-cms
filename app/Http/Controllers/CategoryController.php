<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$categories = Category::orderBy( 'name', 'asc' )->paginate( 20 );

		return view( 'manage.posts.categories.index', compact( 'categories' ) );
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

			'category_name' => 'required|min:2|max:255',
			//'tag_description' => 'max:255'

		] );

		$category       = new Category();
		$category->name = $request->category_name;

		//$category->description = $request->tag_description;


		if ( empty( $request->category_slug ) ) {

			$category->slug = Str::slug( $request->category_name, '-' );

		} else {

			$category->slug = Str::slug( $request->category_slug, '-' );
		}

		$categorySlugExists = Category::where( 'slug', $category->slug )->exists();


		if ( $categorySlugExists ) {

			$i = 1;

			$baseSlug = $category->slug;

			while ( Category::where( 'slug', $category->slug )->exists() ) {

				$category->slug = $baseSlug . "-" . $i ++;

			}
		}


		$category->save();


		return redirect()->route( 'categories.index' )->with( 'status', 'New category saved.' );
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

		$category = Category::findOrFail( $id );

		return view( 'manage.posts.categories.edit', compact( 'category' ) );
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
			'category_name' => 'required|min:2|max:255',
			//'tag_description' => 'max:255'
		] );

		$category              = Category::find( $id );
		$category->name        = $request->category_name;
		$category->description = $request->category_description;


		if ( $category->slug !== $request->category_slug ) {

			if ( empty( $request->category_slug ) ) {

				$category->slug = Str::slug( $request->category_name, '-' );

			} else {

				$category->slug = Str::slug( $request->category_slug, '-' );
			}

			$categorySlugExists = Category::where( 'slug', $category->slug )->exists();


			if ( $categorySlugExists ) {

				$i = 1;

				$baseSlug = $category->slug;

				while ( Category::where( 'slug', $category->slug )->exists() ) {

					$category->slug = $baseSlug . "-" . $i ++;

				}
			}

		}


		$category->save();


		return redirect()->route( 'categories.index' )->with( 'status', 'New category saved.' );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {

		$category = Category::findOrFail( $id );

		$category->delete();

		return redirect()->route( 'categories.index' )->with( 'status', 'Category is deleted.' );
	}
}
