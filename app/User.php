<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'profile', 'status',
    ];

    protected $hidden = [
        'password', 'remember_token', 'status', 'profile',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
