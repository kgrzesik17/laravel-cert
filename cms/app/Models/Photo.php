<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //

    public function imageable() {
        return $this->morphTo();
    }

    public function photos() {
        return $this->morphMany('App\Models\Photo', 'imageable');
    }
}
