<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MentorExport implements FromView
{

    public function __construct($mentors)
    {

       $this->mentors = $mentors;
    }
   /**
   * @return \Illuminate\Support\View
   */
   public function view(): View
   {

       return view('mentors.mentorexport',[
        'mentors'=>$this->mentors
       ]);
   }

}
