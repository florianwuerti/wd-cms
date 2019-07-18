<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;

class PageController extends Controller
{
    //

	public function start(  ) {

		$pages = Page::where('page_status', 3)->get();


		return view('frontend.pages.home', compact('pages'));
	}
}
