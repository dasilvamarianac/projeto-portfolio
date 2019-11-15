<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndicatorValue extends Model
{
    protected $fillable = [
        'indicator_project',  'value',
    ];

    protected $hidden = [
        'indicator_project',  'value',
    ];
}
