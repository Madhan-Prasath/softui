<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Semester::class);

        $semesters= Semester::all();

        return view ('semesters.index')->with('semesters', $semesters);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Semester::class);

        return view('semesters.create');
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

            'semester' => 'required|unique:semesters|max:255',

        ]);

        $semester           = new Semester;
        $semester->semester = $request->input('semester');

        $semester->save();

        return redirect()->route('semesters.index')->with('Success','Semester Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show(Semester $semester)
    {
        $id = $semester->id;

        $this->authorize('view', Semester::find($id));

        return view('semesters.show', compact('semester'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Semester::find($id));

        $semester = Semester::find($id);

        return view('semesters.edit')->with('semesters', $semester);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'semester' =>  'required|unique:semesters|max:255',

        ]);

          $semester           = Semester::find($id);
          $semester->semester = $request->semester;

          $semester->save();

        return redirect('semesters')->with('success', 'Semester Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Semester::class);

        Semester::destroy($id);

        return redirect('semesters')->with('success', 'Semester deleted!');

    }
}
