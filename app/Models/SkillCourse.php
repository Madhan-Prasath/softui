<?php

namespace App\Models;

use App\Models\Skill;
use App\Models\SkillStudent;
use App\Models\SkillFaculty;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SkillCourse extends Model
{
    use HasFactory;

    protected $table    = 'skill_courses';

    protected $fillable = [

        'name',
        'status',
        'code',
        'skill_id',

    ];


    public function skills()
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }

    public function skill_faculties()
    {
        return $this->hasMany(SkillFaculty::class, 'skill_courses_id')->where('status' ,'=', 'ACTIVE'); // for acive faculties to skill courses
    }

    public function skill_students()
    {
        return $this->hasMany(SkillStudent::class, 'skill_courses_id')->where('status' ,'=', 'ACTIVE');// for active students to skill courses
    }

}
