<?php

namespace App\Exports;

use App\Models\SkillFaculty;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;



class SkillFacultyExport implements FromView
{

    public function __construct($skill_faculties)
    {

       $this->skill_faculties = $skill_faculties;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {

        return view('skill_faculties.skillfacultyexport',[
         'skill_faculties'=>$this->skill_faculties
        ]);
    }
}
