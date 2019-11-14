<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusChange extends Model
{
    protected $fillable = [
        'project', 'responsible','status','justification',
    ];
    protected $hidden = [
        'project', 'responsible','status', 
    ];
}
