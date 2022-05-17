<?php

namespace App\Models;

use App\Models\Student;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Batch extends Model
{
    use HasFactory;

    protected $table = 'batches';

    protected $fillable = [
        'batch',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

}
