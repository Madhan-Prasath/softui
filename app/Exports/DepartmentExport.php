<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DepartmentExport implements FromView
{
    public function __construct($departments)
    {

       $this->departments = $departments;
    }
   /**
   * @return \Illuminate\Support\View
   */
   public function view(): View
   {

       return view('departments.departmentexport',[
        'departments'=>$this->departments
       ]);
   }
   
}
