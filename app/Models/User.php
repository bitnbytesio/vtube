<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password', 'roles'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function rules( $type = null, $id = null ) {

        $r = [
            'display_name' => 'required|max:60',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
        ];

        if ($type == 'update') {
            $r['username'] = 'unique:users,username,' . $id;
            $r['email'] = 'unique:users,email,' . $id;
        }

        return $r;

    }

    public function setPasswordAttribute( $v ) {
        $this->attributes['password'] = bcrypt($v);
    }

    public function roles() {
        return $this->hasMany('App\Models\UserRole');
    }

    public static function hasRole(\App\Models\User $user, $role) {
        if (empty($user->roles->all())) return false;


        $roles = [];

        foreach ($user->roles as $user_role) {
            array_push($roles, $user_role->role->key);
        }

        return in_array($role, $roles);

    }

    public function userRoles() {
        if (empty($this->roles->all())) return [];

         $roles = [];

        foreach ($this->roles as $user_role) {
            array_push($roles, $user_role->role->key);
        }

        unset($this->roles);

        return $roles;
    }

}
