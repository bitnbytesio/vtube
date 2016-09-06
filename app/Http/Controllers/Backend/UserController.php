<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use Validator;

class UserController extends Controller {

	public function index() {
		

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

		$validation = Validator::make($request->all(), $rules);

		if ($validation->fails()) {
			return ['success' => $request->all(), 'errors' => $validation->errors()];
		}

		$user->display_name = $request->get('display_name');
		$user->username = $request->get('username');
		$user->email = $request->get('email');
		$user->password = $request->get('password');
		$user->save();

		return ['success' => true];

	}

	


}