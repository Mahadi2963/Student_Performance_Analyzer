<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'subject_img', // Newly added field for subject image
    ];

    // You can add relationships to students, teachers, or marks as needed
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function teachers()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function marks()
    {
        return $this->hasMany(Mark::class);
    }
}