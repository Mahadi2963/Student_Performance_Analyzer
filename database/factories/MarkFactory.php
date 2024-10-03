<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mark>
 */
class MarkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => \App\Models\Student::factory(),
            'subject_id' => \App\Models\Subject::factory(),
            'teacher_id' => \App\Models\Teacher::factory(),
            'present_count' => $this->faker->numberBetween(0, 100),
            'absent_count' => $this->faker->numberBetween(0, 100),
            'classTest_1' => $this->faker->numberBetween(0, 100),
            'Lab_Test1' => $this->faker->numberBetween(0, 100),
            'mid_mark' => $this->faker->numberBetween(0, 100),
            'classTest_2' => $this->faker->numberBetween(0, 100),
            'Lab_Test2' => $this->faker->numberBetween(0, 100),
            'assignment' => $this->faker->numberBetween(0, 100),
            'External_activity' => $this->faker->numberBetween(0, 100),
            // 'total_mark' => $this->faker->numberBetween(0, 1000),
            // 'predicted_total_marks' => $this->faker->optional()->numberBetween(0, 1000),
        ];
    }
}
