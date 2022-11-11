<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            'title' => fake('fr_FR')->text(15),
            'description' => fake('fr_FR')->text(50),
            'price' => fake()->numberBetween(12, 3000),
            'pageNumber' => fake()->numberBetween(50, 125),
            'file_path' => 'uploads/test.pdf',
            'category' => fake()->randomElement(['Romance', 'Dramatique', 'Action', 'Littérature']),
            'language' => fake()->randomElement(['Français', 'Malagasy', 'Anglais'])
        ];
    }
}
