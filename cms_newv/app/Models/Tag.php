<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //

    public function posts() {
        return $this->morphedByMany('App\Models\Post', 'taggable');
    }

    public function videos() {
        return $this->morphedByMany('App\Models\Video', 'taggable');
    }
}
