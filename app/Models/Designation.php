<?php

namespace App\Models;

use App\Models\Faculty;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Designation extends Model
{
    use HasFactory;

    protected $table    = 'designations';

    protected $fillable = [

        'designations',

    ];

    public function faculties()
    {
        return $this->hasMany(Faculty::class);
    }

}
