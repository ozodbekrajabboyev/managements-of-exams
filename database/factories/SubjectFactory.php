<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subjects = [
            "Mathematics",
            "English",
            "Science",
            "Social Studies",
            "History",
            "Geography",
            "Physics",
            "Chemistry",
            "Biology",
            "Computer Science",
        ];

        return [
            'name' => fake()->randomElement($subjects),
        ];
    }
}
