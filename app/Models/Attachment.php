<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Attachment Model
 */
class Attachment extends Model
{

    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo('App\Models\Post', 'attachmentable_id');
    }

    public function comment()
    {
        return $this->belongsTo('App\Models\Comment');
    }

    public function userPic()
    {
        return $this->hasOne('App\Models\User');
    }

    public function commentattach()
    {
        return $this->hasOne('App\Models\Comment');
    }
}
