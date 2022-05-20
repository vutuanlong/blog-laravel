<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory {

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition() {
		return [
			'category_id' => $this->faker->randomDigit,
			'title'       => $this->faker->sentence,
			'slug'        => $this->faker->slug,
			'excerpt'     => $this->faker->sentence,
			'body'        => $this->faker->sentence,
		];
	}
}
