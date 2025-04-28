<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function post() {

        return $this->hasOne('App\Models\Post');  // default: user_id
        // return $this->hasOne('App\Models\Post', 'the_user_id');

    }

    public function posts() {

        return $this->hasMany('App\Models\Post');

    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function roles() {
        return $this->belongsToMany('App\Models\Role')->withPivot('created_at');

        // // customize table names
        // return $this->belongsToMany('App\Models\Role', 'role_user', 'user_id', 'role_id');
    }

    public function photos() {
        return $this->morphMany('App\Models\Photo', 'imageable');
    }
}
