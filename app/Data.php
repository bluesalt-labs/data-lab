<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{

    protected $table = 'data';

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


    public function app() {
        return $this->belongsTo('App\App');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
