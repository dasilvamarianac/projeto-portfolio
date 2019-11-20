<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'users','permissions','indicators','members','projects','project_detail','project_member', 'project_indicators','status_change','indicator_value','reports','progress','profile','analysis',
    ];

    protected $hidden = [
        'users','permissions','indicators','members','projects','project_detail','project_member', 'project_indicators','status_change','indicator_value','reports','progress','profile','analysis',
    ];
}


