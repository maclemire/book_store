<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Books>
 */
class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Creation of fake books for the database
        return [
            'title' => fake()->sentence(2),
            'description' => fake()->sentence(120),
            'author' => fake()->name(),
            'image' => "https://loremflickr.com/g/320/240/book",
            'price' => fake()->randomNumber(2, true),
            'nombre_pages' => fake()->randomNumber(3, true),
        ];
    }
}
