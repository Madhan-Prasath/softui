<?php

namespace App\Http\Controllers;

use App\Models\Academic_Year;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny' , Academic_Year::class);

        $academic_years= Academic_Year::all();

        return view ('academic_years.index')->with('academic_years', $academic_years);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create' , Academic_Year::class);

        return view('academic_years.create');
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

            'academic_year'          => 'required|unique:academic_years|max:255',

        ]);

        $academic_year                = new Academic_Year;
        $academic_year->academic_year = $request->input('academic_year');

        $academic_year->save();

        return redirect()->route('academic_years.index')->with('Success','Academic Year Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Academic_Year  $academic_Year
     * @return \Illuminate\Http\Response
     */
    public function show(Academic_Year $academic_year)
    {
        $id = $academic_year->id;

        $this->authorize('view' , Academic_Year::find($id));

        return view('academic_years.show', compact('academic_year'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Academic_Year  $academic_Year
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update' , Academic_Year::find($id));

        $academic_year = Academic_Year::find($id);

        return view('academic_years.edit')->with('academic_years', $academic_year);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Academic_Year  $academic_Year
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([

            'academic_year'             =>  'required|unique:academic_years|max:255',
            'id'                        =>  'required',
        ]);

        $academic_year                = Academic_Year::find($id);
        $academic_year->academic_year = $request->academic_year;

        $academic_year->save();

        return redirect('academic_years')->with('success', 'Academicyear Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Academic_Year  $academic_Year
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete' , Academic_Year::class);

        Academic_Year::destroy($id);

        return redirect('academic_years')->with('success', 'academicyear deleted!');
    }
}
