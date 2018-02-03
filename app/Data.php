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
        'type_id', 'user_id', 'created_at', 'updated_at',
    ];


    public function type() {
        return $this->belongsTo('App\Type');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
