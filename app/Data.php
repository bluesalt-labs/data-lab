<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'data'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'type_id', 'user_id'
    ];
}