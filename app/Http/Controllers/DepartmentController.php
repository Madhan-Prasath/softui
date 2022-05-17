<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;

use App\Exports\DepartmentExport;
use Maatwebsite\Excel\Facades\Excel;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Department::class);

        $departments = Department::all();

        return view ('departments.index',['departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Department::class);

        return view('departments.create');
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

            'name'    => 'required|unique:departments|max:255',
            'code'    => 'required|unique:departments|max:255',
            'status'  => 'required',

        ]);

        $department         = new Department;
        $department->name   = $request->input('name');
        $department->code   = $request->input('code');
        $department->status = $request->input('status');

        $department->save();

        return redirect()->route('departments.index')->with('Success','Department Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        $id = $department->id;

        $this->authorize('view', Department::find($id));

        return view('departments.show', compact('department'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Department::find($id));

        $department = Department::find($id);

        return view('departments.edit')->with('departments', $department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'name'   => 'required',
            'code'   =>  'required',
            'status' => 'required',

        ]);

        $department         =  Department::find($id);
        $department->name   =  $request->name;
        $department->code   =  $request->code;
        $department->status =  $request->status;
        $department->id     =  $request->id;

        $department->save();

        return redirect('departments')->with('success', 'Department Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Department::class);

        Department::destroy($id);

        return redirect('departments')->with('success', 'Department deleted!');
    }

    public function export()
    {
        $departments = Department::all();

        return Excel::download(new DepartmentExport($departments),'departments.xlsx');
    }
}
