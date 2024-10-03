<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'name',
        'email',
        'contact',
        'password',
        'student_img', // Newly added field for student image
        'is_verified',
    ];

    // You can add a relationship to marks, subjects, or other entities as needed

    public function marks()
    {
        return $this->hasMany(Mark::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}