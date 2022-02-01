<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Technology;
use App\Models\CourseTechnology;
use App\Models\Course;
use App\Http\Requests\CourseTechnologyRequest;
class CourseTechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $GetCourse         = QueryBuilder::for(CourseTechnology::class)->get()->pluck('course_id');
        $CheckedCourse     = QueryBuilder::for(Course::class)->whereIn('id',$GetCourse)->get();
        return view('admin.course-technology.view-course-technology', compact('CheckedCourse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Course            = QueryBuilder::for(Course::class)->get();
        $Technology        = QueryBuilder::for(Technology::class)->get();
        return view('admin.course-technology.course-technology', compact('Course','Technology'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseTechnologyRequest $request)
    {
        $Course     = Course::find($request->course_id);
        $Technology = $request->technology_id;
        $Course->Technology()->attach($Technology);
        return redirect()->back()->with('success', 'Course Technology successfully stored');
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
        $Course            = QueryBuilder::for(Course::class)->get();
        $GetCourse         = QueryBuilder::for(Course::class)->find($id);
        $Technology        = QueryBuilder::for(Technology::class)->get();
        $checkedTechnology = collect($GetCourse->Technology)->pluck('id')->toArray();
        return view('admin.course-technology.edit-course-technology', compact('checkedTechnology','Course','GetCourse','Technology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseTechnologyRequest $request, $id)
    {
        $Course     = Course::find($request->course_id);
        $Technology = $request->technology_id;
        $Course->Technology()->sync($Technology);
        return redirect()->back()->with('success', 'Course Technology successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
