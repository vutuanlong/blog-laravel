<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostsController extends Controller {
	public function index() {
		return view( 'admin.posts.index', [
			'posts' => Post::paginate( 10 ),
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

	public function edit( Post $post ) {
		return view( 'admin.posts.edit', [
			'post' => $post,
		] );
	}

	public function update( Post $post ) {

		$attributes = request()->validate( [
			'title'       => 'required',
			'thumbnail'   => 'image',
			'slug'        => [ 'required', Rule::unique( 'posts', 'slug' )->ignore( $post->id ) ],
			'excerpt'     => 'required',
			'body'        => 'required',
			'category_id' => [ 'required', Rule::exists( 'categories', 'id' ) ],
		] );

		$post->update( $attributes );

		return back()->with( 'success', 'Post Updated!' );
	}

	public function delete( Post $post ) {
		$post->delete();

		return back()->with( 'success', 'Post Deleted!' );
	}
}
