<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FacultyExport implements FromView
{
    public function __construct($faculties)
    {

       $this->faculties = $faculties;
    }
   /**
   * @return \Illuminate\Support\View
   */
   public function view(): View
   {

       return view('faculties.facultyexport',[
        'faculties'=>$this->faculties
       ]);
   }
}
