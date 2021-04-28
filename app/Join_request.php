<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Join_request extends Model
{
    use softDeletes;

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $fillable = 
    [
        'user_id',
        'post_id',
        'to_distinguish_number',
        'creaetd_at',
        'updated_at',
    ];
}
