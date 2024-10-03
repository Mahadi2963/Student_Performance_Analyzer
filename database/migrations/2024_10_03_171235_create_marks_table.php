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
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
            $table->foreignId('teacher_id')->constrained('teachers')->onDelete('cascade');

            // Marks given by teacher
            $table->integer('present_count')->default(0);
            $table->integer('absent_count')->default(0);
            $table->integer('classTest_1')->default(0);
            $table->integer('Lab_Test1')->default(0);
            $table->integer('mid_mark')->default(0);
            $table->integer('classTest_2')->default(0);
            $table->integer('Lab_Test2')->default(0);
            $table->integer('assignment')->default(0);
            $table->integer('External_activity')->default(0);
            $table->integer('total_mark')->default(0); // Total calculated marks

            // Predicted total marks (from ML model)
            $table->integer('predicted_total_marks')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marks');
    }
};
