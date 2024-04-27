<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle,
            'description' => fake()->paragraphs(3, true),
            'salary' => fake()->numberBetween(5_000, 150_000), // (_) is a separator symbol.
            'location' => fake()->city,
            'category' => fake()->randomElement(Job::$category), // static array in Job model.
            'experience' => fake()->randomElement(Job::$experience) // static array in Job model.
        ];
    }
}
