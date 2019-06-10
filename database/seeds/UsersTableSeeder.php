<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


/**
 * Class UsersTableSeeder
 */
class UsersTableSeeder extends Seeder {

	/**
	 *
	 */
	public function run() {
		DB::table( 'users' )->insert( [
			'first_name' => 'John',
			'last_name'  => 'Miller',
			'email'     => 'test@test.com',
			'password'  => bcrypt( '1234' ),
			'display_name' => 'Jon Miller',
			'registered' => Carbon::create('2000', '01', '01', '12' , '12' , '0'),
		] );
	}
}
