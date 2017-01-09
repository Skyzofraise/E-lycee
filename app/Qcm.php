<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qcm extends Model
{
	
	protected $fillable = [ 'title', 'content', 'class_level', 'status'];

	public function choices()
	{
	   return $this->hasMany('App\Choice');
	}

	public function scores()
	{
	   return $this->hasMany('App\Score');
	}
}