<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'student_name' => $this->faker->name(),
            'student_lastname' => $this->faker->sentence(2),
            'birthdate' => $this->faker->date(),
            'comments' => $this->faker->paragraph(),
        ];
    }
}