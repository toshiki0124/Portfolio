<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function place()
    {
        return $this->belongsTo('App\Place');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    protected $fillable = [
        'title',
        'place_id',
        'detail_place',
        'body',
        'user_id',
    ];
}
