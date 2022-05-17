<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Faculty;
use App\Models\Feedback;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Mentor extends Model
{
    use HasFactory;

    protected $table    = 'mentors';

    protected $fillable = [

        'student_id',
        'faculty_id',
        'mentor_status',

    ];

    public function students()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    public function faculties()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

}
