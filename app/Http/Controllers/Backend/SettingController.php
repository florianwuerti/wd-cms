<?php

namespace App\Http\Controllers\Backend;

use App\Setting\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


/**
 * Class SettingController
 * @package App\Http\Controllers\Backend
 */
class SettingController extends Controller {

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */

	public function index() {

		return view( 'manage.setting.index' );

	}

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Illuminate\Validation\ValidationException
	 */

	public function store( Request $request ) {

		return redirect()->back()->with( 'status', 'Settings has been saved.' );
	}
}
