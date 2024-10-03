<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


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
            'student_id' => $this->faker->unique()->numerify('STU#####'),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'contact' => $this->faker->phoneNumber,
            'student_img' => $this->faker->imageUrl(640, 480, 'people', true, 'Faker'),
            'password' => bcrypt('password'), // Default password for all students
            'is_verified' => $this->faker->boolean,
        ];
    }
}
