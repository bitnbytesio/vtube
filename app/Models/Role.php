<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

	protected $table = 'roles';
	public $timestamps = false;

	public static function rules() {

		$roles_ids = [];

		foreach (static::getAll() as $role) {
			array_push($roles_ids, $role->id);
		}

		return ['roles' => 'required|array|in:' . implode(',', $roles_ids) ];

	}

	public static function getAll() {
		return static::where('key', '!=', 'super_admin')->get();
	}

	

	
}