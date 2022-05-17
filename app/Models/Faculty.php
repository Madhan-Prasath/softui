<?php

namespace App\Models;

use App\Models\Mentor;
use App\Models\Department;
use App\Models\Designation;
use App\Models\SkillFaculty;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Faculty extends Model
{
    use HasFactory;

    protected $table    = 'faculties';

    protected $fillable = [

        'name',
        'email',
        'status',
        'acultyid',
        'department_id',
        'designation_id'

    ];

    public function departments()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function mentors()
    {
        return $this->hasOne(Mentor::class ,'faculty_id');
    }

    public function designations()
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }

    public function skill_faculties()
    {
        return $this->hasMany(SkillFaculty::class, 'faculty_id');
    }
}
