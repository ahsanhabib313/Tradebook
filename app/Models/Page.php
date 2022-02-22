<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Page Model
 */
class Page extends Model
{

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
