<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;

use App\Exports\FacultyExport;
use Maatwebsite\Excel\Facades\Excel;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Faculty::class);

        $faculties = Faculty::all();

        return view ('faculties.index')->with('faculties', $faculties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Faculty::class);

        $faculties    = Faculty::all();
        $departments  = Department::all();
        $designations = Designation::all();

        return view('faculties.create', compact('faculties','departments','designations'));
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

            'name'           => 'required',
            'email'          =>  'required|unique:faculties|max:255',
            'status'         => 'required',
            'department_id'  => 'required',
            'designation_id' => 'required',
            'facultyid'      => 'required|unique:faculties|max:255',
        ]);

        $faculty                 = new Faculty;
        $faculty->name           = $request->input('name');
        $faculty->email          = $request->input('email');
        $faculty->status         = $request->input('status');
        $faculty->department_id  = $request->input('department_id');
        $faculty->designation_id = $request->input('designation_id');
        $faculty->facultyid      = $request->input('facultyid');

        $faculty->save();

        return redirect()->route('faculties.index')->with('status','Faculty Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        $id = $faculty->id;

        $this->authorize('view', Faculty::find($id));

        $students = $faculty->mentors->all()->where('faculty_id', '=', $id);

        return view('faculties.show', compact('faculty' , 'students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Faculty::find($id));

        $faculty      = Faculty::find($id);
        $departments  = Department::all();
        $designations = Designation::all();

        return view('faculties.edit' , compact('faculty','departments','designations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'name'           => 'required',
            'email'          => 'required',
            'status'         => 'required',
            'department_id'  => 'required',
            'designation_id' => 'required',
            'facultyid'      => 'required',

          ]);

          $faculty                 =  Faculty::find($id);
          $faculty->name           =  $request->name;
          $faculty->email          =  $request->email;
          $faculty->status         =  $request->status;
          $faculty->department_id  =  $request->department_id;
          $faculty->designation_id =  $request->designation_id;
          $faculty->id             =  $request->id;
          $faculty->save();

      return redirect('faculties')->with('success', 'Faculty Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Faculty::class);

        Faculty::destroy($id);

        return redirect('faculties')->with('success', 'Faculty deleted!');

    }
    public function export()
    {
        $faculties = Faculty::all();

        return Excel::download(new FacultyExport($faculties),'faculties.xlsx');
    }
}
