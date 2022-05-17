<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny' , Batch::class);

        $batches= Batch::all();

        return view ('batches.index')->with('batches', $batches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create' , Batch::class);

        return view('batches.create');
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

            'batch'   => 'required|unique:batches|max:255',

        ]);

        $batch        = new Batch;
        $batch->batch = $request->input('batch');

        $batch->save();

        return redirect()->route('batches.index')->with('Success','Batch Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(Batch $batch)
    {
        $id = $batch->id;
        
        $this->authorize('view' , Batch::find($id));

        return view('batches.show', compact('batch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update' , Batch::find($id));

        $batch = Batch::find($id);

        return view('batches.edit')->with('batches', $batch);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'batch'     =>  'required|unique:batches|max:255',

        ]);

        $batch        = Batch::find($id);
        $batch->batch = $request->batch;
        $batch->save();

        return redirect('batches')->with('success', 'Batch Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete' , Batch::class);

        Batch::destroy($id);

        return redirect('batches')->with('success', 'Batch deleted!');
    }
}
