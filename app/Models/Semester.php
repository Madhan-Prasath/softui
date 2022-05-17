<?php

namespace App\Models;

use App\Models\Student;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Semester extends Model
{
    use HasFactory;

    protected $table    = 'semesters';

    protected $fillable = [

        'semester',

    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
