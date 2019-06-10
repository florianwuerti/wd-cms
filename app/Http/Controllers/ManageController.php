<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware( 'auth' );
	}

	public function index() {
		return view( 'manage.dashboard' );
	}

	public function dashboard() {
		return view( 'manage.dashboard' );
	}

	public function login() {
		return view( 'auth.login' );
	}
}
