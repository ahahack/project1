<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {

	protected $guarded = [];

	public function projects() {
		return $this->hasMany(Project::class);
	}
}
