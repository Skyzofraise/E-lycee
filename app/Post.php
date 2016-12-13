<?php

namespace App;

use Carbon\Carbon;
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

}
