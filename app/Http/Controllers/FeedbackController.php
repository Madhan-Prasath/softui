<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use App\Models\Student;
use App\Models\Faculty;
use App\Models\Feedback;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;


class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('ViewAny', Feedback::class);

        $feedback= Feedback::all();

        $result  =  Mentor::select('faculties.id','faculties.name','faculties.facultyid','mentors.id','feedback.rating')

                            ->leftJoin('students','mentors.student_id','=','students.id')

                            ->leftJoin('faculties','faculties.id','=','mentors.faculty_id')

                            ->rightJoin('feedback','students.id','=','feedback.student_id')

                            ->select('faculties.id','faculties.name', 'faculties.facultyid',

                             DB::raw('avg(feedback.rating) as avg'),DB::raw('count(feedback.rating) as count'))

                            ->groupBy(['faculties.id'])

                            ->orderBy('avg' , 'desc')

                            ->get();

        return view ('feedback.index' , compact('feedback' , 'result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Feedback::class);

        $email=auth()->user()->email;

        $student = Student::where('email', '=', $email)->first();  // check student or not

        if ($student==null) {

            return view('feedback.contact');
        }

        if ((Feedback::whereDate('created_at', Carbon::today())->where("student_id", "=", $student->id)->count()) != 0 ){

            return view('feedback.limit');
        }

        $checkrated = Feedback::where('student_id',$student->id)->count();  // check already rated

        if ($checkrated >= 1) {

            return view('feedback.limit');

        }

        $student = Student::where('email', '=', $email)->first();

        $mentors = $student->mentors;  // identify mentor details

        if ($mentors=="[]") {

            return view('feedback.map');

        }

        $faculty = $mentors->first()->faculties; // faculty details


        return view('feedback.create', compact('mentors','student','faculty'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated   = $request->validate([

            'rating' =>  'required',

        ]);

        $email=auth()->user()->email;

        $student              =  Student::where('email', '=', $email)->first();
        $mentors              =  $student->mentors->first();
        $feedback             =  new Feedback;
        $feedback->student_id =  $student->id ;
        $feedback->mentor_id  =  $mentors->id;
        $feedback->rating     =  $request->input('rating');
        $feedback->comments   =  $request->input('comments',null);

        $feedback->save();

        return view('feedback.done')->with('status','Feedback Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Feedback::destroy($id);

        return redirect('feedback')->with('success', 'Feedback deleted!');

    }
}
