<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Join_request extends Model
{
    protected $fillable = 
    [
        'user_id',
        'post_id',
        'to_distinguish_number',
        'creaetd_at',
        'updated_at',
    ];
}
