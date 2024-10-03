<?php

namespace Database\Seeders;

use App\Models\Mark;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        Student::factory()->count(8)->create();
        Teacher::factory()->count(8)->create();
        Subject::factory()->count(8)->create();
        Mark::factory()->count(8)->create();
    }
}
