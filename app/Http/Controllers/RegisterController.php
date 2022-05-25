<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller {
	public function create() {
		return view( 'register' );
	}

	public function store() {
		$attributes = request()->validate( [
			'name'     => 'required',
			'username' => 'required|unique:users,username',
			// 'username' => [ 'required', Rule::unique( 'users', 'username' ) ],
			'email'    => 'required|email|unique:users,email',
			'password' => 'required',
		] );

		$user = User::create( $attributes );

		auth()->login( $user );

		return back()->with( 'success', 'Cảm ơn bạn đã gửi thông tin. Chúng tôi sẽ liên hệ lại với bạn sớm nhất!' );
	}
}
