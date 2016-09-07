<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use DB;
use Validator;

class UserController extends Controller {

	public function index(\Illuminate\Http\Request $request) {
		

		$users = new User();

		if (!empty($request->get('q'))) {
			$user->where('display_name', 'like', "%{$request->get('q')}%")
			->orWhere('username', 'like', "%{$request->get('q')}%")
			->orWhere('email', 'like', "%{$request->get('q')}%");
		}

		return $users->paginate(20);

	}

	public function get( $id ) {
		if ($user = User::find($id)) {
			return ['success' => true, 'data' => $user];
		}

		return ['success' => false];
	}

	public function save(\Illuminate\Http\Request $request) {

		$user = new User();

		$rules = User::rules();

		if (!empty($request->get('id'))) {
			$user = $user->find($request->get('id'));
			$rules = User::rules('update', $request->get('id'));
		}

		$validation = Validator::make($request->all(), array_merge($rules, Role::rules()));

		//var_dump(array_merge($rules, Role::rules()));
		//exit;

		if ($validation->fails()) {
			return ['success' => false, 'errors' => $validation->errors()];
		}

		try {
			DB::beginTransaction();


			$user->display_name = $request->get('display_name');
			$user->username = $request->get('username');
			$user->email = $request->get('email');
			$user->password = $request->get('password');
			$user->save();

			UserRole::where('user_id', $user->id)->delete();

			$userRoles = [];

			foreach ($request->get('roles') as $role) {
				array_push($userRoles, ['user_id' => $user->id, 'role_id' => $role]);
			}

			UserRole::insert($userRoles);

			DB::commit();

			return ['success' => true];

		} catch (Exception $e) {
			DB::rollBack();
			return ['success' => false, 'alert' => ['text' => 'Unable to save user', 'class' => 'danger']];
		}
		

	}

	


}