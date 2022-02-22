<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Comment Model
 */
class Reply extends Model
{
    protected $guarded = [];


    public function comment()
    {
        return $this->hasOne('App\Models\Comment');
    }


    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'reply_by');
    }
}
