<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Page;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class PageController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$pages = Page::orderBy( 'id', 'desc' )->paginate( 20 );

		$pagesPublished = $this->showAllPublishedPages();
		$pagesTrash     = $this->pagesInTrash();
		$pagesDrafts    = $this->pagesInDrafts();


		return view( 'manage.pages.index', compact( 'pages', 'pagesPublished', 'pagesTrash', 'pagesDrafts' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view( 'manage.pages.create' );
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
			'page_title'     => 'required|min:4|max:255',
			'menu_order'     => 'numeric',
			'page_thumbnail' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
		] );

		$page               = new Page();
		$page->page_title   = $request->page_title;
		$page->page_content = $request->page_content;
		$page->author_id    = Auth::user()->id;
		$page->published_at = Carbon::now();
		$page->menu_order   = $request->page_order;


		if ( empty( $request->page_slug ) ) {

			$page->page_slug = Str::slug( $request->page_title, '-' );

		} else {

			$page->page_slug = Str::slug( $request->page_slug, '-' );
		}

		$pageSlugExists = Page::where( 'page_slug', $page->page_slug )->exists();


		if ( $pageSlugExists ) {

			$i = 1;

			$baseSlug = $page->page_slug;

			while ( Page::where( 'page_slug', $page->page_slug )->exists() ) {

				$page->page_slug = $baseSlug . "-" . $i ++;

			}
		}


		if ( $request->hasFile( 'page_thumbnail' ) ) {

			// Get image file
			$image = $request->file( 'page_thumbnail' );

			$filename = $image->getClientOriginalName();

			$location = public_path( '/uploads/images/' . $filename );

			Image::make( $image->getRealPath() )->save( $location );

			$page->image = $filename;
		};

		if ( $request->page_save_publish === 'page_save_publish' ) {
			$page->page_status = '3';
		}

		if ( $request->page_save_draft === 'page_save_draft' ) {
			$page->page_status = '1';
		}

		$page->save();
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

		$page = Page::findOrFail( $id );

		return view( 'manage.pages.edit', compact( 'page' ) );
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
			'page_title' => 'required|max:255',
			'menu_order' => 'numeric',
			'image'      => 'image|mimes:jpeg,png,jpg,svg|max:2048'

		] );

		$page               = Page::findOrFail( $id );
		$page->page_title   = $request->page_title;
		$page->page_content = $request->page_content;
		$page->menu_order   = $request->page_order;

		if ( $request->hasFile( 'image' ) ) {


			// Get image file
			$image = $request->file( 'image' );

			$filename = $image->getClientOriginalName();

			$location = public_path( '/uploads/images/' . $filename );

			Image::make( $image->getRealPath() )->save( $location );

			$page->page_thumbnail = $filename;
		};


		if ( $request->page_save_publish === 'page_save_publish' ) {
			$page->page_status = '3';
		}

		if ( $request->page_save_draft === 'page_save_draft' ) {
			$page->page_status = '1';
		}

		$page->save();

		return redirect()->route( 'pages.edit', $page->id )->with( 'status', 'Page is saved.' );
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

	public function toTrash( $id ) {

		$page = Page::where( 'id', $id )->first();

		$page->delete();

		$page->save;

		return redirect()->route( 'page.index' );

	}

	public function showAllPublishedPages() {

		$posts = Page::where( 'page_status', 3 )->get();

		$posts->published = $posts;

		return $posts->published;
	}

	public function pagesInTrash() {

		$posts = Page::onlyTrashed()->get();

		$posts->trash = $posts;

		return $posts->trash;
	}

	public function pagesInDrafts() {

		$posts = Page::where( 'page_status', '1' )->get();

		$posts->drafts = $posts;

		return $posts->drafts;

	}
}
