<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'author' => fake()->name(),
            'isbn' => fake()->unique()->numberBetween(1, 9999999999999),
            'cover' => fake()->slug() . ".jpg",
            'published_year' => fake()->year(),
            'description' => fake()->text(),
            'stock' => fake()->randomDigitNotZero(),
            'category_id' => Category::factory(),
        ];
    }
}
