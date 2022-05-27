<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

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

	public function create() {
		return view( 'admin.create' );
	}

	public function store() {
		// $path = request()->file( 'thumbnail' )->store( 'thumbnails' );
		// return 'Done: ' . $path;
		$attributes = request()->validate( [
			'title'       => 'required',
			'thumbnail'   => 'required|image',
			'slug'        => [ 'required', Rule::unique( 'posts', 'slug' ) ],
			'excerpt'     => 'required',
			'body'        => 'required',
			'category_id' => [ 'required', Rule::exists( 'categories', 'id' ) ],
		] );

		$attributes['thumbnail'] = request()->file( 'thumbnail' )->store( 'thumbnails' );
		Post::create( $attributes );

		return redirect( '/' );
	}
}
