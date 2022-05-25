<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller {
	public function create() {
		return view( 'login' );
	}

	public function store() {
		$attributes = request()->validate([
			'username' => 'required',
			'password' => 'required',
		]);

		if ( auth()->attempt( $attributes ) ) {
			session()->regenerate();
			return redirect( '/' );
		}

		// Auth failed
		throw ValidationException::withMessages([
			'username' => 'Fail',
		]);

		// return back()
		// ->withInput()
		// ->withErrors( [ 'username' => 'Fail' ] );
	}

	public function destroy() {
		auth()->logout();

		return redirect( '/' )->with( 'success', 'Good bye' );
	}
}
