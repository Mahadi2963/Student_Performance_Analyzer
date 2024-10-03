<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'name',
        'email',
        'contact',
        'password',
        'teacher_img', // Newly added field for teacher image
        'is_verified',
    ];

    // You can add a relationship to subjects, students, or other entities as needed
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function marks()
    {
        return $this->hasMany(Mark::class);
    }
}