<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Post;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get( '/', [ PostsController::class, 'index' ] );

Route::get( 'posts/{post:slug}', [ PostsController::class, 'show' ] );

Route::get( 'categories/{category:slug}', function( Category $category ) {
	return view( 'home', [
		'posts' => $category->post,
	] );
} );

Route::get( 'register', [ RegisterController::class, 'create' ] )->middleware( 'guest' );
Route::post( 'register', [ RegisterController::class, 'store' ] )->middleware( 'guest' );

Route::get( 'login', [ SessionsController::class, 'create' ] )->middleware( 'guest' );
Route::post( 'login', [ SessionsController::class, 'store' ] )->middleware( 'guest' );
Route::post( 'logout', [ SessionsController::class, 'destroy' ] )->middleware( 'auth' );


// Admin
Route::get( 'admin/posts', [ AdminPostsController::class, 'index' ] )->middleware( 'admin' );
Route::get( 'admin/posts/create', [ AdminPostsController::class, 'create' ] )->middleware( 'admin' );
Route::post( 'admin/posts', [ AdminPostsController::class, 'store' ] )->middleware( 'admin' );
Route::get( 'admin/posts/{post}/edit', [ AdminPostsController::class, 'edit' ] )->middleware( 'admin' );
Route::patch( 'admin/posts/{post}', [ AdminPostsController::class, 'update' ] )->middleware( 'admin' );
Route::delete( 'admin/posts/{post}', [ AdminPostsController::class, 'delete' ] )->middleware( 'admin' );
