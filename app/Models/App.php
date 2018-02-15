<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class App extends Model
{
    protected $table = 'apps';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'app_name',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'app_token', 'created_at', 'updated_at',
    ];

    private function client() {
        //return $this->hasOne()
    }

    public function clientName() {
        //return $this->client()->name;
    }
}
