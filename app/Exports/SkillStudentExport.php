<?php

namespace App\Exports;

use App\Models\SkillStudent;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SkillStudentExport implements FromView
{

    public function __construct($skill_students)
    {

       $this->skill_students = $skill_students;
    }
    /**
    * @return \Illuminate\Support\View
    */
    public function view(): View
    {

        return view('skill_students.skillstudentexport',[
         'skill_students'=>$this->skill_students
        ]);
    }
}
