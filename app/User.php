<?php

namespace App;

use Laravel\Passport\HasApiTokens;
//use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\Role;

class User extends Authenticatable
{
    //use Notifiable;
    use HasApiTokens;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at',
    ];

    public function fullName() {
        return $this->first_name .' '. $this->last_name;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles() {
        return $this->belongsToMany(Role::class, 'user_roles')->withTimestamps();
    }

    /**
     * @param array $permissions
     * @return bool
     */
    public function hasAccess(array $permissions) : bool {
        // check if the permission is available in any role
        foreach($this->roles as $role) {
            if($role->hasAccess($permissions)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param string $roleSlug
     * @return bool
     */
    public function inRole(string $roleSlug) {
        return $this->roles()->where('slug', $roleSlug)->count() == 1;
    }
}
