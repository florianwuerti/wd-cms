<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model {

	use SoftDeletes;

	public function author() {

		return $this->belongsTo( User::Class )->withDefault( [
			'display_name' => 'Guest Author'
		] );
	}


	public function tags() {
		return $this->belongsToMany( Tag::class );
	}

	public function categories() {
		return $this->belongsToMany( Category::class );
	}
}
