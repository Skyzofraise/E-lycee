<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable=[
        'user_id',
        'title',
        'abstract',
        'content',
        'url_thumbnail',
        'date',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getPublishedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function setUserIdAttribute($value)
    {
        if($value == 0)
            $this->attributes['user_id'] = null;
        else
            $this->attributes['user_id'] = $value;
    }
}
