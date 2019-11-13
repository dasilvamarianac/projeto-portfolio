<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{
    protected $fillable = [
        'project', 'member',
    ];

    protected $hidden = [
        'project', 'member',
    ];
}
