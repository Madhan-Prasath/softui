<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Student;
use App\Models\SkillCourse;
use App\Models\SkillStudent;
use App\Models\SkillFaculty;
use App\Models\SkillFeedback;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkillFeedbackController extends Controller

{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->authorize('viewAny', SkillFeedback::class);

        $skill_feedback  = SkillFeedback::all();

        $skill_faculties = SkillFaculty::all();

        $skill_courses   = SkillCourse::all();

        $result          =  SkillCourse::select('skill_faculties.faculty_id','faculties.name','faculties.facultyid','skill_courses.id',
                                'skill_courses.name as course_name','skill_feedback.rating')

                                ->leftJoin('skill_faculties','skill_courses.id','=' , 'skill_faculties.skill_courses_id')

                                ->leftJoin('skill_students','skill_students.skill_faculty_id','=','skill_faculties.id')

                                ->rightJoin('skill_feedback','skill_students.id','=','skill_feedback.skill_student_id')

                                ->leftJoin('faculties','skill_faculties.faculty_id','=','faculties.id')

                                ->select('faculties.id','faculties.name', 'faculties.facultyid','skill_courses.name as course_name',

                                 DB::raw('avg(skill_feedback.rating) as avg'), DB::raw('count(skill_feedback.rating) as count'))

                                ->groupBy(['faculties.id','skill_courses.name'])

                                ->get();

        return view ('skill_feedback.index', compact('skill_feedback' , 'result'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', SkillFeedback::class);

        $email=auth()->user()->email; // for collect  entered user email

        $student       = Student::where('email', '=', $email)->get()->first(); // for check entered user registered student or not

        if ($student == null) {

            return view('skill_feedback.contactadmin');

        }
        $rated         = SkillFeedBack::pluck('skill_student_id');
        $skillStudent  = SkillStudent::where('student_id', '=', $student->id)->whereNotIn('id', $rated)->get();  // To retrive students without already rated

        return view('skill_feedback.create', compact('skillStudent'));
    }


    public function update(Request $request,  $skill_student)
    {
        $validated = $request->validate([

            'rating' =>  'required',

        ]);

        $skill_feedback                   =  new SkillFeedback;
        $skill_feedback->skill_student_id =  $skill_student;
        $skill_feedback->rating           =  $request->input('rating');

        $skill_feedback->save();

        return redirect()->route('skill_feedback.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

    }


    public function register()
    {
        $this->authorize('register', SkillFeedback::class);

        $email=auth()->user()->email;

        $students       = Student::where('email', '=', $email)->get()->first(); // for check entered user registered student or not

        if ($students == null) {

            return view('skill_feedback.contactadmin');

        }


        $skill_courses   = SkillCourse::all();

        $skill_faculties = SkillFaculty::where('status', '=', 'ACTIVE')->get();


        return view('skill_feedback.register', compact('students','skill_faculties','skill_courses'));
    }

 }
