<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Post Model
 */
class Post extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function postattach()
    {
        return $this->hasOne('App\Models\Attachment', 'attachmentable_id', 'id');
    }

    public function postauthorpic()
    {
        return $this->hasOne('App\Models\User', 'attachmentable_id', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
