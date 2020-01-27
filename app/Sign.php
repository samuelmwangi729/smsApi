<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sign extends Model
{
    public $fillable=['user_id','sign'];

    protected $casts=[
        'user_id'=>'integer',
        'sign'=>'string'
    ];

    public static $rules=[
        'user_id'=>'required',
        'sign'=>'required'
    ];
}
