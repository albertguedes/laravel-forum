<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    /** @use HasFactory<\Database\Factories\UserProfileFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'birth_date',
        'username',
        'bio',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function name(): string
    {
        $name = $this->first_name;

        if ($this->middle_name) {
            $name.= ' ' . $this->middle_name;
        }

        $name.= ' ' . $this->last_name;

        return $name;
    }
}
