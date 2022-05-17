<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StudentsExport implements FromView
{

     public function __construct($students)
     {

        $this->students = $students;
     }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {

        return view('students.studentsExport',[
         'students'=>$this->students
        ]);
    }
}
