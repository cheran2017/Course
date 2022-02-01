<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Batch;
use App\Models\CourseTitle;
use App\Models\CourseTechnology;
use App\Models\Learning;
use App\Http\Requests\BatchRequest;
use App\Helpers\Validate;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Batch = QueryBuilder::for(Batch::class)->get();
        return view('admin.batch.view-batch', compact('Batch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.batch.create-batch');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BatchRequest $request)
    {
        $Batch         = new Batch;
        $Batch->name   = $request->name;
        $Batch->timing = $request->timing;
        $Batch->save();
        return redirect()->back()->with('success', 'Batch successfully Saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Batch = QueryBuilder::for(Batch::class)->find($id);
        return view('admin.batch.edit-batch', compact('Batch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BatchRequest $request, $id)
    {
        $Batch         = Batch::find($id);
        $Batch->name   = $request->name;
        $Batch->timing = $request->timing;
        $Batch->save();
        return redirect()->back()->with('success', 'Batch successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Batch::find($id)->delete();
        return redirect()->back()->with('success', 'Batch successfully Deleted');

    }
}
