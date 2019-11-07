<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Project extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'desc',	'budget', 'scope','start_date','expected_date',	'end_date', 'leader', 'manager', 'office_leader', 'status','risk',
    ];

    protected $hidden = [
        'budget', 'scope','leader', 'manager','office_leader',
    ];

}
