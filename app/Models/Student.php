<?php

namespace App\Models;

use App\Models\Mentor;
use App\Models\Semester;
use App\Models\Department;
use App\Models\SkillStudent;
use App\Models\Academic_Year;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Student extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'students';

    protected $fillable = [

        'name',
        'email',
        'status',
        'department_id',
        'semester',
        'rollno',
        'academic_year_id',
        'batch'

    ];

    public function departments()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function semesters()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }

    public function academic_years()
    {
        return $this->belongsTo(Academic_Year::class, 'academic_year_id');
    }

    public function mentors()
    {
        return $this->hasMany(Mentor::class)->where('mentor_status' ,'=', 'ACTIVE');
    }

    public function batches()
    {
        return $this->belongsTo(Batch::class, 'batch_id');
    }

    public function feedback()
    {
        return $this->hasOne(Feedback::class);
    }

    public function skill_students()
    {
        return $this->hasMany(SkillStudent::class, 'Student_id');
    }
}
