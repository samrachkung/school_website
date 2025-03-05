<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    protected $fillable = [
        'schedule_day',
        'schedule_date',
        'start_time',
        'end_time'
    ];

    // Relationship with Teachers
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
