<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SkillCourseExport implements FromView
{

    public function __construct($skill_courses)
    {

       $this->skill_courses = $skill_courses;
    }
    /**
    * @return \Illuminate\Support\View
    */
    public function view(): View
    {

        return view('skill_courses.skillcourseexport',[
         'skill_courses'=>$this->skill_courses
        ]);
    }

}
