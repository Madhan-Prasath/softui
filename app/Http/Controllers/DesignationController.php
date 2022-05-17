<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Designation::class);

        $designations = Designation::all();

        return view ('designations.index')->with('designations', $designations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Designation::class);

        return view('designations.create');
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

            'designation' => 'required|unique:designations|max:255',

        ]);

        $designation              = new Designation;
        $designation->designation = $request->input('designation');

        $designation->save();

        return redirect()->route('designations.index')->with('Success','Designation Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(Designation $designation)
    {
        $id = $designation->id;

        $this->authorize('view', Designation::find($id));

        return view('designations.show', compact('designation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Designation::find($id));

        $designation = Designation::find($id);

        return view('designations.edit')->with('designations', $designation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([

            'designation'  => 'required|unique:designations|max:255',

        ]);

        $designation              = Designation::find($id);
        $designation->designation = $request->designation;

        $designation->save();

        return redirect('designations')->with('success', 'Designation Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Designation::class);

        Designation::destroy($id);

        return redirect('designations')->with('success', 'Designation deleted!');
    }
}
