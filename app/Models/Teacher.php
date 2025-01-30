<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'teacher_code',
        'teacher_name',
        'teacher_dob',
        'teacher_email',
        'teacher_phone',
        'teacher_profile',
        'address',
        'teacher_photo',
        'gender_id',
        'schedule_id',
        'major_id',
        'course_id',
        'subject_id'
    ];

    // Relationship with Gender
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    // Relationship with Schedule
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    // Relationship with Major
    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    // Relationship with Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Relationship with Subject
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
