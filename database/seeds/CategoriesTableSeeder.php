<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


/**
 * Class CategoriesTableSeeder
 */
class CategoriesTableSeeder extends Seeder {

	/**
	 *
	 */
	public function run() {
		DB::table( 'categories' )->insert( [
			'name'        => 'General',
			'description' => '',
			'slug'        => 'general',
			'created_at' => Carbon::now()
		] );
	}
}
