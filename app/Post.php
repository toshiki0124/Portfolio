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

    public function join_requests()
    {
        return $this->hasMany('App\Join_request');
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

    public static function boot()
    {
        parent::boot();

        static::deleted(function ($post) {

            $post->join_requests()->delete();
            
            $post->messages()->delete();
        });
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function getPaginateBylimit(int $limit_count = 7)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}


