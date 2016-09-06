<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model {

	protected $table = 'user_roles';
	public $timestamps = false;

	public function users() {
		return $this->belongsToMany('App\Models\User');	
	}

	public function role() {
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }

	
}