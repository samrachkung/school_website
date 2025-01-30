<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $fillable = [
        'name',
        'status'
    ];

    // Relationship with Teachers
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
