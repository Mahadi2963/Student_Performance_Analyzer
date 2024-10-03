<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_id')->unique(); // Unique teacher ID
            $table->string('name');
            $table->string('email')->unique();
            $table->string('contact');
            $table->string('teacher_img')->nullable(); // Image column for teachers
            $table->string('password');
            $table->boolean('is_verified')->default(false); // Admin verification
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
