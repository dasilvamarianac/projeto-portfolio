<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectIndicator extends Model
{

    protected $fillable = [
        'project', 'indicator', 'status', 'max_value','min_value',
    ];

    protected $hidden = [
        'project', 'indicator', 'status', 'max_value','min_value',
    ];

}