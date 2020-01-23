<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    protected $fillable=[
        'number'
    ];
    protected $casts=[
        'number'=>'string'
    ];

    public static $rules=[
        'number'=>'required'
    ];
}
