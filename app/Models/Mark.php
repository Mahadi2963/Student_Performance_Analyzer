<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;



    protected $fillable = [
        'student_id',
        'subject_id',
        'teacher_id',
        'present_count',
        'absent_count',
        'classTest_1',
        'Lab_Test1',
        'mid_mark',
        'classTest_2',
        'Lab_Test2',
        'assignment',
        'External_activity',
        'total_mark',
        'predicted_total_marks'
    ];

    protected static function booted()
    {
        static::saving(function ($mark) {
            $mark->total_mark = $mark->classTest_1 + $mark->Lab_Test1 +
                $mark->mid_mark + $mark->classTest_2 +
                $mark->Lab_Test2 + $mark->assignment +
                $mark->External_activity;
        });
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
