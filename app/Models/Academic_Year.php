<?php

namespace App\Models;

use App\Models\Student;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Academic_Year extends Model
{
    use HasFactory;

    protected $table    = 'academic_years';

    protected $fillable = [

        'academic_year',
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'academic_year_id');
    }

}
