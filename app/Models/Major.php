<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $table = 'majors';
    protected $fillable = [
        'major_type',
        'description',
        'status'
    ];
    use HasFactory;

    // Relationship with Courses
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    // Relationship with Teachers
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
