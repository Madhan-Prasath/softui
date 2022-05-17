<?php

namespace App\Models;

use App\Models\Mentor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Feedback extends Model
{
    use HasFactory;

    protected $table    = 'feedback';

    protected $fillable = [

        'mentor_id',
        'rating',
        'comments',
        'student_id',

    ];

    public function faculties()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }

    public function students()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
