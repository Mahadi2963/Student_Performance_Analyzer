<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'teacher_id' => $this->faker->unique()->numerify('TCH###'),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'contact' => $this->faker->phoneNumber,
            'teacher_img' => $this->faker->optional()->imageUrl(640, 480, 'people'),
            'password' => bcrypt('password'), // or use Hash::make('password')
            'is_verified' => $this->faker->boolean,
        ];
    }
}
