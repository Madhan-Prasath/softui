<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use App\Models\Faculty;
use App\Models\Student;
use Illuminate\Http\Request;

use App\Exports\MentorExport;
use Maatwebsite\Excel\Facades\Excel;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Mentor::class);

        $mentors = Mentor::all();

        return view ('mentors.index')->with('mentors', $mentors);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Mentor::class);

        $faculties = Faculty::all();
        $students  = Student::all();

        return view('mentors.create', compact('students','faculties'));
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

            'student_id'    => 'required',
            'faculty_id'    => 'required',
            'mentor_status' => 'required',

        ]);

        $mentor                = new Mentor;
        $mentor->student_id    = $request->input('student_id');
        $mentor->faculty_id    = $request->input('faculty_id');
        $mentor->mentor_status = $request->input('mentor_status');

        // check mentor  already exist or not

        $active_mentor_count   = Mentor::all()->where("student_id", "=", $mentor->student_id)->where("mentor_status" , "ACTIVE")->count();

        if ($active_mentor_count==1){

            return view('mentors.mentorexist');
        }

        $mentor->save();

        return redirect()->route('mentors.index')->with('status','Mentor Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function show(Mentor $mentor)
    {
        $id = $mentor->id;

        $this->authorize('view', Mentor::find($id));

        return view('mentors.show', compact('mentor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Mentor::find($id));

        $mentor    = Mentor::find($id);
        $faculties = Faculty::all();
        $students  = Student::all();

        return view('mentors.edit' , compact('mentor','faculties','students'));
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

            'student_id'    => 'required',
            'faculty_id'    => 'required',
            'mentor_status' => 'required',

        ]);

        $mentor                = Mentor::find($id);
        $mentor->student_id    = $request->student_id;
        $mentor->faculty_id    = $request->faculty_id;
        $mentor->mentor_status = $request->mentor_status;

        $mentor->save();

        return redirect('mentors')->with('success', 'Mentor Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Mentor::class);

        Mentor::destroy($id);

        return redirect('mentors')->with('success', 'Mentor deleted!');
    }

    public function export()
    {
        $mentors = Mentor::all();

        return Excel::download(new MentorExport($mentors),'mentors.xlsx');
    }
}
