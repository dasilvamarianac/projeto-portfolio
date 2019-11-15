<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $fillable = [
        'project',  'user', 'status', 'inform',
    ];

    protected $hidden = [
        'project',  'user', 'status', 'inform',
    ];
}

