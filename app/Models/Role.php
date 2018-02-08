<?php

namespace App\Models;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const DEFAULT_ROLE  = 'new_account';
    const GUEST_ROLE    = 'guest';

    protected $table = 'roles';

    protected $fillable = [
        'name', 'slug', 'permissions',
    ];

    protected $casts = [
        'permissions' => 'array',
    ];
    
    public function users() {
        return $this->belongsToMany(User::class, 'user_roles')->withTimestamps();
    }
    
    public function hasAccess(array $permissions) : bool {
        foreach ($permissions as $permission) {
            if($this->hasPermission($permission)) { return true; }
        }

        return false;
    }

    private function hasPermission(string $permission) : bool {
        return $this->permissions[$permission] ?? false;
    }

    public static function getDefaultID() {
        return Role::where('slug', self::DEFAULT_ROLE)->first()->id;
    }

    public static function getGuestID() {
        return Role::where('slug', self::GUEST_ROLE)->first()->id;
    }
}
