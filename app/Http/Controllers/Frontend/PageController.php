<?php

namespace App\Http\Controllers\Frontend;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Support\Str;

class PageController extends Controller {
	//

	public function start() {

		$pages = Page::where( 'page_status', 3 )->get();


		return view( 'frontend.pages.home', compact( 'pages' ) );
	}

	public function getPages( $slug ) {

		$page = Page::where( 'page_slug', $slug )->firstOrFail();

		$pages = Page::where( 'page_status', 3 )->get();

		$posts = Post::where( 'post_status', 3 )->get();

		return view()->first(
			[
				"frontend/template-part/pages-{$page->page_slug}",
				'frontend/template-part/pages-default'
			], compact( 'page', 'pages', 'posts' )
		);
	}

	public function blog() {

		$posts = Post::where( 'post_status', 3 )->get();

		$posts->post_content = Str::words($posts->post_content,10);


		return view( 'frontend.template-part.pages-blog', compact( 'posts' ) );
	}
}
