<?php

namespace App\Models;

use App\Models\SkillCourse;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    protected $table    = 'skills';

    protected $fillable = [

        'name',
        'status',

    ];


     public function skill_courses()
    {
        return $this->hasMany(SkillCourse::class, 'skill_id');
    }
}
