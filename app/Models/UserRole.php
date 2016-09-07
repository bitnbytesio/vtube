<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model {

	protected $table = 'user_roles';
	public $timestamps = false;

	protected $fillable = ['user_id', 'role_id'];

	public function users() {
		return $this->belongsToMany('App\Models\User');	
	}

	public function role() {
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }

	
}