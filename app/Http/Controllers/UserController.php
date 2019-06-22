<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Request;
use App\User;
use Session;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware( 'auth' );
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$users = User::orderBy( 'id', 'desc' )->paginate( 20 );

		return view( 'manage.users.index', compact( 'users' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view( 'manage.users.create' );
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
			'first_name' => 'required|max:255',
			'last_name'  => 'required|max:255',
			'email'      => 'required|email|unique:users',
		] );

		if ( ! empty( $request->password ) ) {
			$password = trim( $request->password );
		} else {
			# set the manual password
			$length   = 10;
			$keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
			$str      = '';
			$max      = mb_strlen( $keyspace, '8bit' ) - 1;
			for ( $i = 0; $i < $length; ++ $i ) {
				$str .= $keyspace[ random_int( 0, $max ) ];
			}
			$password = $str;
		}
		$user               = new User();
		$user->first_name   = $request->first_name;
		$user->last_name    = $request->last_name;
		$user->display_name = $request->first_name . ' ' . $request->last_name;
		$user->registered   = Carbon::now();
		$user->email        = $request->email;
		$user->password     = Hash::make( $password );

		$user->save();

		return redirect()->route( 'users.show', $user->id );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {

		$user = User::findOrFail( $id );

		return view( 'manage.users.show', compact( 'user' ) );

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {

		$user = User::findOrFail( $id );

		return view( 'manage.users.edit', compact( 'user' ) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param int $id
	 *
	 * @param $image1
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $id ) {

		$validatedData = $request->validate( [
			'first_name'     => 'required|max:255',
			'last_name'      => 'required|max:255',
			'email'          => 'required|email|unique:users,email,' . $id,
			'image' => 'image|mimes:jpeg,png,jpg|max:2048'

		] );

		$user             = User::findOrFail( $id );
		$user->first_name = $request->first_name;
		$user->last_name  = $request->last_name;
		$user->display_name = $request->first_name . ' ' . $request->last_name;
		$user->email      = $request->email;


		if ( $request->new_password ) {
			$user->password = Hash::make( $request->new_password );
		}

		if ( $request->hasFile( 'image' ) ) {

			// Get image file
			$image = $request->file( 'image' );

			$filename = $image->getClientOriginalName();

			$location = public_path( '/uploads/images/' . $filename );

			Image::make( $image->getRealPath() )->save( $location );

			$user->image = $filename;
		};

		if ( $user->save() ) {
			//session()->flash('', '')
			Session::flash( 'success', 'Your new Password:' );

			return redirect()->route( 'users.show', $user->id );
		} else {

			Session::flash( 'error', 'There was a problem saving the updated user info to the database. Try again.' );

			return redirect()->route( 'users.show', $user->id );
		}
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

	public function logout() {
		Auth::logout();

		return redirect()->route( 'login' );
	}

}
