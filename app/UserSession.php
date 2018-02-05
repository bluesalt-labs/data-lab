<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSession extends Model
{

    protected $table = 'user_sessions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'user_id', 'app_id', 'session_token', 'created_at', 'expires_at',
    ];
}
