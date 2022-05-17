<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;


class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Skill::class);

        $skills= Skill::all();

        return view ('skills.index')->with('skills', $skills);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Skill::class);

        return view('skills.create');

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

            'name'   => 'required|unique:skills|max:255',
            'status' => 'required',

        ]);

        $skill         = new Skill;
        $skill->name   = $request->input('name');
        $skill->status = $request->input('status');

        $skill->save();

        return redirect()->route('skills.index')->with('Success','Skill Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        $id = $skill->id;

        $this->authorize('view', Skill::find($id));

        $courses  = $skill->skill_courses;

        return view('skills.show', compact('skill','courses'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Skill::find($id));

        $skill = Skill::find($id);

        return view('skills.edit')->with('skills', $skill);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'name'   =>  'required',
            'status' => 'required',

        ]);

        $skill         = Skill::find($id);
        $skill->name   = $request->name;
        $skill->status = $request->status;

        $skill->save();

        return redirect('skills')->with('success', 'Skill Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Skill::class);

        Skill::destroy($id);

        return redirect('skills')->with('success', 'Skill deleted!');
    }


}
