<?php

namespace App\Models;

use App\Models\Student;
use App\Models\SkillCourse;
use App\Models\SkilFeedback;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class SkillStudent extends Model

{
    use HasFactory;

    protected $table    = 'skill_students';

    protected $fillable = [

        'student_id',
        'skill_courses_id',
        'skill_faculty_id',
        'status',

    ];

    public function skill_courses()
    {
        return $this->belongsTo(SkillFaculty::class, 'skill_faculty_id')->where('status' ,'=', 'ACTIVE');
    }

    public function skill_feedback()
    {
        return $this->belongsTo(SkillFeedback::class, 'skill_student_id');
    }

    public function students()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function skill_faculties()
    {
        return $this->belongsTo(SkillFaculty::class, 'skill_faculty_id');
    }


}
