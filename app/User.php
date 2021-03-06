<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'email', 'password', 'profile_picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $dates = ['deleted_at'];

    public function person()
    {
        return $this->hasOne(Person::class);
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }

    public function groupPermissions()
    {
        return $this->hasMany(GroupPermission::class);
    }

    public function hasPermission($userId, $permissionName)
    {
        return count(Permission::where('user_id', $userId)->where('name', $permissionName)) > 0 ? true : false;
    }
}
