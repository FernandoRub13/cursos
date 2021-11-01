<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    protected $fillable = ['body', 'course_id'];

    use HasFactory;
    // Relacion uno a uno inversa
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
