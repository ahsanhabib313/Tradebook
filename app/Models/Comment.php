<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Comment Model
 */
class Comment extends Model
{
    protected $guarded = [];


    public function post()
    {
        return $this->hasOne('App\Models\Post');
    }
    public function reply()
    {
        return $this->hasMany('App\Models\Reply');
    }

    public function users()
    {
        return $this->hasOne('App\Models\User', 'id', 'comment_by');
    }
    public function attach()
    {
        return $this->hasOne('App\Models\Attachment', 'attachmentable_id');
    }


    public function attachment()
    {
        return $this->hasOne('App\Models\Comment');
    }
}
