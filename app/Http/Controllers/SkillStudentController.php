<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Faculty;
use App\Models\SkillCourse;
use App\Models\SkillFaculty;
use App\Models\SkillStudent;

use App\Exports\SkillStudentExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class SkillStudentController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', SkillStudent::class);

        $skill_students = SkillStudent::all();

        return view ('skill_students.index')->with('skill_students', $skill_students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', SkillStudent::class);

        $students        = Student::all();

        $skill_courses   = SkillCourse::all();

        $skill_faculties = SkillFaculty::where('status', '=', 'ACTIVE')->get();

        $skill_courses   = SkillCourse::all();

        return view('skill_students.create', compact('students','skill_faculties','skill_courses'));
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

            'skill_faculty_id' => 'required',
            'student_id'       => 'required',
            'status'           => 'required',
            'skill_courses_id' => 'required',

        ]);

        $skill_student                      = new SkillStudent;
        $skill_student->student_id          = $request->input('student_id');
        $student                            = $skill_student->student_id;
        $skill_student->skill_faculty_id    = $request->input('skill_faculty_id');
        $faculty                            = $skill_student->skill_faculty_id;
        $skill_student->skill_courses_id    = $request->input('skill_courses_id');
        $skill_student->status              = $request->input('status');

        $count = SkillStudent::where('student_id',$student)->where('skill_faculty_id',$faculty)->count();

        if ($count == 1)
        {

            return view('skill_students.map')->with('status', 'Student and Faculty Already Mapped');
        }

        $skill_student->save();

        return redirect()->route('skill_students.index')->with('status','Skill Student Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function show(SkillStudent $skill_student)
    {
        $id = $skill_student->id;

        $this->authorize('view', SkillStudent::find($id));

        return view('skill_students.show', compact('skill_student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', SkillStudent::find($id));

        $skill_student   = SkillStudent::find($id);
        $students        = Student::all();
        $skill_courses   = SkillCourse::all();
        $skill_faculties = SkillFaculty::where('status', '=', 'ACTIVE')->get();

        return view('skill_students.edit' , compact('skill_student','students','skill_courses','skill_faculties'));
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
            'skill_faculty_id' => 'required',
            'student_id'       => 'required',
            'status'           => 'required',
            'skill_courses_id' => 'required',
        ]);

        $skill_student                   = SkillStudent::find($id);
        $skill_student->skill_courses_id = $request->skill_courses_id;
        $skill_student->student_id       = $request->student_id;
        $skill_student->skill_faculty_id = $request->skill_faculty_id;
        $skill_student->status           = $request->status;

        $skill_student->save();

        return redirect('skill_students')->with('success', 'Skill Student Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', SkillStudent::class);

        SkillStudent::destroy($id);

        return redirect('skill_students')->with('success', 'Skill Student deleted!');


    }
    public function export()
    {
        $skill_students = SkillStudent::all();

        return Excel::download(new SkillStudentExport($skill_students),'skill_students.xlsx');
    }

}
