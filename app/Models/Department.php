<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Faculty;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Department extends Model
{
    use HasFactory;

    protected $table    = 'departments';

    protected $fillable = [

        'name',
        'code',
        'status',

    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'department_id');
    }

    public function faculties()
    {
        return $this->hasMany(Faculty::class, 'department_id');
    }
}
