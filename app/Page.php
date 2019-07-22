<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use VanOns\Laraberg\Models\Block;
use VanOns\Laraberg\Models\Gutenbergable;

class Page extends Model {

	use SoftDeletes;
	use Gutenbergable {
		renderContent as renderLBContent;
	}


	public function author() {

		return $this->belongsTo( User::Class );
	}

	public function lb_blocks() {

		return $this->belongsTo( Block::Class );
	}

}
