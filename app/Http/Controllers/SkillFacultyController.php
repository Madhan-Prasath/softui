<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\SkillCourse;
use App\Models\SkillFaculty;
use App\Models\SkillStudent;
use Illuminate\Http\Request;

use App\Exports\SkillFacultyExport;
use Maatwebsite\Excel\Facades\Excel;

class SkillFacultyController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', SkillFaculty::class);

        $skill_faculties = SkillFaculty::all();

        return view ('skill_faculties.index')->with('skill_faculties', $skill_faculties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', SkillFaculty::class);

        $faculties     = Faculty::all();
        $skill_courses = SkillCourse::all();

        return view('skill_faculties.create', compact('faculties','skill_courses'));
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

            'skill_courses_id' => 'required',
            'faculty_id'       => 'required',
            'status'           => 'required',
            'startdate'        => 'required',
            'enddate'          => 'required',
        ]);

        $skill_faculty                   =  new SkillFaculty;
        $skill_faculty->faculty_id       =  $request->input('faculty_id');
        $skill_faculty->skill_courses_id =  $request->input('skill_courses_id');
        $skill_faculty->status           =  $request->input('status');
        $skill_faculty->startdate        =  $request->input('startdate');
        $skill_faculty->enddate          =  $request->input('enddate');

        $skill_faculty->save();

        return redirect()->route('skill_faculties.index')->with('status','Skill Faculty Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function show(SkillFaculty $skill_faculty)
    {
        $id = $skill_faculty->id;

        $this->authorize('view', SkillFaculty::find($id));

        $skill_students =  SkillStudent::all();
        $students       =  $skill_faculty->skill_courses->skill_students->where('skill_faculty_id' , $id); // find skill students for particular skill faculty`

        return view('skill_faculties.show', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', SkillFaculty::find($id));

        $skill_faculty  = SkillFaculty::find($id);
        $faculties      = Faculty::all();
        $skill_courses  = SkillCourse::all();

        return view('skill_faculties.edit' , compact('skill_faculty','faculties','skill_courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'skill_courses_id' => 'required',
            'faculty_id'       => 'required',
            'status'           => 'required',
            'startdate'        => 'required',
            'enddate'          => 'required',

        ]);

        $skill_faculty                   =   SkillFaculty::find($id);
        $skill_faculty->skill_courses_id =   $request->skill_courses_id;
        $skill_faculty->faculty_id       =   $request->faculty_id;
        $skill_faculty->status           =   $request->status;
        $skill_faculty->startdate        =   $request->startdate;
        $skill_faculty->enddate          =   $request->enddate;

        $skill_faculty->save();

        return redirect('skill_faculties')->with('success', 'Skill Faculty Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', SkillFaculty::class);

        SkillFaculty::destroy($id);

        return redirect('skill_faculties')->with('success', 'Skill Faculty deleted!');
    }

    public function export()
    {
        $skill_faculties = SkillFaculty::all();

        return Excel::download(new SkillFacultyExport($skill_faculties),'skill_faculties.xlsx');
    }



}
