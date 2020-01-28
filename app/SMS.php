<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
    public $fillable=[
        'message','number'
    ];


    protected $casts=[
        'message'=>'string',
        'number'=>'string'
    ];

    protected static $rules=[
        'message'=>'required',
        'number'=>'required'
    ];
}
