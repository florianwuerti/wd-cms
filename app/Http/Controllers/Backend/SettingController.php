<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting\Setting;


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

		$rules = Setting::getValidationRules();

		$data = $this->validate( $request, $rules );

		$validSettings = array_keys( $rules );

		foreach ( $data as $key => $val ) {

			if ( in_array( $key, $validSettings ) ) {
				Setting::add( $key, $val, Setting::getDataType( $key ) );
			}

		}

		return redirect()->back()->with( 'status', 'Settings has been saved.' );
	}
}
