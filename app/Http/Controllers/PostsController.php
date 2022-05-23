<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller {
	public function index() {
		$posts = Post::latest();

		if ( request( 'search' ) ) {
			$posts->where( 'title', 'like', '%' . request( 'search' ) . '%' );
		}

		return view( 'home', [
			'posts' => $posts->paginate( 9 ),
			// 'posts' => $posts->get(),
		] );
	}

	public function show( Post $post ) {
		return view( 'post', [
			'post' => $post,
		] );
	}
}
