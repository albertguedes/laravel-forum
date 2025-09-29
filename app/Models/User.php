<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
    * Scope a query to only include popular posts.
    * https://www.scratchcode.io
    * @param  \Illuminate\Database\Eloquent\Builder  $query
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function scopeIsActive($query)
    {
        return $query->where('is_active', '=', true);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function forums()
    {
        return $this->hasMany(Forum::class);
    }

    public function profile() {
        return $this->hasOne(UserProfile::class);
    }
}
