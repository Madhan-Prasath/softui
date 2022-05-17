<?php

namespace App\Http\Controllers;


use App\Models\Batch;
use App\Models\Student;
use App\Models\Semester;
use App\Models\Department;
use App\Models\Academic_Year;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
// use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\StudentT;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Student::class);

        $students = Student::all();

        return view ('students.index')->with('students', $students);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Student::class);

        $departments    = Department::all();
        $semesters      = Semester::all();
        $academic_years = Academic_Year::all();
        $batches        = Batch::all();

        return view('students.create', compact('departments','semesters','academic_years','batches'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'name'             => 'required',
            'email'            => 'required|unique:students|max:255',
            'status'           => 'required',
            'department_id'    => 'required',
            'semester_id'      => 'required',
            'academic_year_id' => 'required',
            'batch_id'         => 'required',
            'rollno'           =>  'required|unique:students|max:255',
      ]);

      $student                   =  new Student;
      $student->name             =  $request->input('name');
      $student->email            =  $request->input('email');
      $student->status           =  $request->input('status');
      $student->rollno           =  $request->input('rollno');
      $student->department_id    =  $request->input('department_id');
      $student->semester_id      =  $request->input('semester_id');
      $student->batch_id         =  $request->input('batch_id');
      $student->academic_year_id =  $request->input('academic_year_id');

      $student->save();

      return redirect()->route('students.index')->with('status','Student Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $id = $student->id;

        $this->authorize('view', Student::find($id));

        $mentor = $student->mentors->first()->faculties; // to find mentor for the student

        return view('students.show', compact('student' , 'mentor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Student::find($id));

        $student        =  Student::find($id);
        $departments    =  Department::all();
        $semesters      =  Semester::all();
        $academic_years =  Academic_Year::all();
        $batches        =  Batch::all();

        return view('students.edit' , compact('student','departments','semesters','academic_years','batches'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'name'             => 'required',
            'email'            =>  'required',
            'status'           => 'required',
            'department_id'    => 'required',
            'semester_id'      => 'required',
            'academic_year_id' => 'required',
            'batch_id'         => 'required',
            'rollno'           =>  'required',
        ]);

        $student                   =   Student::find($id);
        $student->name             =   $request->name;
        $student->email            =   $request->email;
        $student->status           =   $request->status;
        $student->rollno           =   $request->rollno;
        $student->department_id    =   $request->department_id;
        $student->semester_id      =   $request->semester_id;
        $student->batch_id         =   $request->batch_id;
        $student->academic_year_id =   $request->academic_year_id;

        $student->save();

        return redirect('students')->with('success', 'Student Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Student::class);

        Student::destroy($id);

        return redirect('students')->with('success', 'Student deleted!');
    }
    public function export()
    {
        $students = Student::all();

        return Excel::download(new StudentsExport($students),'studnts.xlsx');
    }

}
