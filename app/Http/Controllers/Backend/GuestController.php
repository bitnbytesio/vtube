<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Models\Role;

class GuestController extends Controller {

	public function index() {
		return view('backend.layouts.main');
	}

	public function login(\Illuminate\Http\Request $request) {

		$credentials = [
			'password' => $request->get('password')
		];

		 if(filter_var($request->get('username'), FILTER_VALIDATE_EMAIL)) {
		 	$credentials['email'] = $request->get('username');
		 } else {
		 	$credentials['username'] = $request->get('username');
		 }

		if (Auth::attempt($credentials)) {
			return ['success' => true, 'config' => $this->config(), 'location' => '/user/add'];
		}

		return ['success' => false, 'alert' => ['text' => 'Username or password is invalid', 'class' => 'danger']];
		
	}

	public function logout() {
		Auth::logout();
		return ['success' => true, 'config' => $this->config(), 'location' => '/'];
	}

	public function config() {

		$user = Auth::check() ? User::find(Auth::id()) : null;

		return [
			'loggedIn' => Auth::check(),
			'admin_url' =>  config('admin.path', 'admin'),
			'user' => $user,
			'roles' => is_null($user) ? [] : $user->userRoles(),
			'system_roles' => Role::getAll(),
		];
	}

}