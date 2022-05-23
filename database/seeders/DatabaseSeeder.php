<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		Post::factory( 15 )->create();
		Category::factory( 3 )->create();
		User::factory( 2 )->create();
		// \App\Models\User::factory(10)->create();
	}
}
