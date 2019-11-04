<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Indicator extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'desc', 'status',
    ];

    protected $hidden = [
        'status',
    ];

}
