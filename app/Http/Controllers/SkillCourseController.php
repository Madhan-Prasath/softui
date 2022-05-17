<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Student;
use App\Models\SkillFaculty;
use App\Models\SkillCourse;
use App\Models\SkillStudent;
use Illuminate\Http\Request;

use App\Exports\SkillCourseExport;
use Maatwebsite\Excel\Facades\Excel;

class SkillCourseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', SkillCourse::class);

        $skill_courses = SkillCourse::all();

        return view ('skill_courses.index')->with('skill_courses', $skill_courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', SkillCourse::class);

        $skills        = Skill::all();
        $skill_courses = SkillCourse::all();

        return view('skill_courses.create', compact('skills','skill_courses'));
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

            'name'     => 'required|unique:skill_courses|max:255',
            'code'     => 'required|unique:skill_courses|max:255',
            'status'   => 'required',
            'skill_id' => 'required',

        ]);

        $skill_course           = new SkillCourse;
        $skill_course->name     = $request->input('name');
        $skill_course->code     = $request->input('code');
        $skill_course->status   = $request->input('status');
        $skill_course->skill_id = $request->input('skill_id');

        $skill_course->save();

        return redirect()->route('skill_courses.index')->with('status','Skill Course Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(SkillCourse $skill_course)
    {
        $id = $skill_course->id;

        $this->authorize('view', SkillCourse::find($id));

        $students = SkillStudent::where('skill_courses_id', $id)->get(); // for find particular skill course students

        return view('skill_courses.show', compact('skill_course' , 'students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', SkillCourse::find($id));

        $skill_course = SkillCourse::find($id);
        $skills       = Skill::all();

        return view('skill_courses.edit' , compact('skill_course','skills'));
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

            'name'     => 'required',
            'code'     => 'required',
            'status'   => 'required',
            'skill_id' => 'required',

        ]);

        $skill_course           = SkillCourse::find($id);
        $skill_course->name     = $request->name;
        $skill_course->code     = $request->code;
        $skill_course->status   = $request->status;
        $skill_course->skill_id = $request->skill_id;

        $skill_course->save();

        return redirect('skill_courses')->with('success', 'Skill Course Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', SkillCourse::class);

        SkillCourse::destroy($id);

        return redirect('skill_courses')->with('success', 'Skill Course deleted!');
    }

    public function export()
    {
        $skill_courses = SkillCourse::all();

        return Excel::download(new SkillCourseExport($skill_courses),'skill_courses.xlsx');
    }

}
