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
        'teacher_dec',
        'gender_id',

    ];

    // Relationship with Gender
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

}
