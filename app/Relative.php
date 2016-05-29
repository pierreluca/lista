<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relative extends Model
{
    //
	public function relatives(){
		return $this->hasMany('App\Relative');
	}
}

