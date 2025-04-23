<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'content'
    ];

    // find user assigned to post
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    //
    // protected $table = 'posts';
    // protected $primaryKey = 'posts_id';

    protected $dates = ['deleted_at'];

};
