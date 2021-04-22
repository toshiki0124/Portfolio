<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

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
    
    public function users_Manytomany()
    {
        return $this->belongsToMany('App\User');
    }
}


