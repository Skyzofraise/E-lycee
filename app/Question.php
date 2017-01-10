<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	
	protected $fillable = [ 'user_id','title', 'content', 'class_level', 'status'];

	public function user()
    {
        return $this->belongsTo('App\User');
    }

	public function choices()
	{
	   return $this->hasMany('App\Choice');
	}

	public function scores()
	{
	   return $this->hasMany('App\Score');
	}
}