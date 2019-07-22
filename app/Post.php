<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use VanOns\Laraberg\Models\Gutenbergable;

class Post extends Model {

	use SoftDeletes;
	use Gutenbergable;

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
