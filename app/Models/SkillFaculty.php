<?php

namespace App\Models;

use App\Models\Faculty;
use App\Models\SkillCourse;
use App\Models\skillFeedback;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SkillFaculty extends Model
{
    use HasFactory;

    protected $table    = 'skill_faculties';

    protected $fillable = [

        'faculty_id',
        'skill_courses_id',
        'status',
        'startdate',
        'enddate',

    ];

    public function skill_courses()
    {
        return $this->belongsTo(SkillCourse::class, 'skill_courses_id')->where('status' ,'=', 'ACTIVE'); // for active courses to faculties
    }

    public function skill_feedback()
    {
        return $this->hasMany(SkillFeedback::class, 'skill_faculty_id');
    }

    public function faculties()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function skill_students()
    {
        return $this->hasMany(SkillStudent::class);
    }

}
