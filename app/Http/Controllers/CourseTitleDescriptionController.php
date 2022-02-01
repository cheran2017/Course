<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\CourseTitleDetail;
use App\Models\CourseTitle;
use App\Http\Requests\CourseTitleDetailRequest;
class CourseTitleDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CourseTitleDetail   = QueryBuilder::for(CourseTitleDetail::class)->get();
        return view('admin.course-title-detail.view-course-title-detail', compact( 'CourseTitleDetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $CourseTitle         = QueryBuilder::for(CourseTitle::class)->get();
        $CourseTitleDetail   = QueryBuilder::for(CourseTitleDetail::class)->get();
        return view('admin.course-title-detail.course-title-detail', compact('CourseTitle', 'CourseTitleDetail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseTitleDetailRequest $request)
    {
        $CourseTitleDetail                    = new CourseTitleDetail;
        $CourseTitleDetail->course_title_id   = $request->course_title_id;
        $CourseTitleDetail->description       = $request->description;
        $CourseTitleDetail->save();
        return redirect()->back()->with('success', 'Course Title Description successfully stored');
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
        $CourseTitle       = QueryBuilder::for(CourseTitle::class)->get();
        $CourseTitleDetail = QueryBuilder::for(CourseTitleDetail::class)->find($id);
        return view('admin.course-title-detail.edit-course-title-detail', compact('CourseTitle', 'CourseTitleDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseTitleDetailRequest $request, $id)
    {
        $CourseTitleDetail                    = CourseTitleDetail::find($id);
        $CourseTitleDetail->course_title_id   = $request->course_title_id;
        $CourseTitleDetail->description       = $request->description;
        $CourseTitleDetail->save();
        return redirect()->back()->with('success', 'Course Title Description successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CourseTitleDetail::find($id)->delete();
        return redirect()->back()->with('success', 'Course Title Description successfully Deleted');
    }
}
