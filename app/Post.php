<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model {

	use SoftDeletes;

//	protected $dates = ['deleted_at'];


	public function author() {

		return $this->belongsTo( User::Class )->withDefault( [
			'display_name' => 'Guest Author'
		] );
	}
}
