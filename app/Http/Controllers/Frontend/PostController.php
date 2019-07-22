<?php

namespace App\Http\Controllers\Frontend;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller {
	//

	public function getPost( $slug ) {

		$post = Post::where( 'post_slug', $slug )->firstOrFail();
		$pages = Page::where( 'page_status', 3 )->get();

		return view('frontend.template-part.single-post', compact('post', 'pages'));
	}
}