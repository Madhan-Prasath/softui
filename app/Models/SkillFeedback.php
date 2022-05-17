<?php

namespace App\Models;


use App\Models\SkillStudent;
use App\Models\SkillFaculty;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class SkillFeedback extends Model

{
    use HasFactory;

    protected $table    = 'skill_feedback';

    protected $fillable = [

        'skill_student_id',
        'skill_faculty_id',
        'rating',
        'comments',

    ];

    public function skill_students()
    {
        return $this->belongsTo(SkillStudent::class, 'skill_student_id');
    }

    public function skill_faculties()
    {
        return $this->belongsTo(SkillFaculty::class, 'skill_faculty_id');
    }

}
