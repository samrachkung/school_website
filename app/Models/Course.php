<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'course_code',
        'course_name',
        'syllabus',
        'duration',
        'course_price',
        'major_id'
    ];

    // Relationship with Major
    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    // Relationship with Subjects
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    // Relationship with Teachers
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
