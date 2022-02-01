<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Course;
use App\Models\Category;
use App\Http\Requests\CategoryCourseRequest;

class CategoryCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Category   = QueryBuilder::for(Category::class)->get();
        return view('admin.category-course.view-category-course', compact('Category'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Course  = QueryBuilder::for(Course::class)->get();   
        return view('admin.category-course.create-category-course', compact('Course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCourseRequest $request)
    {
        $Category       = new Category;
        $Category->name = $request->name;
        $Category->save();

        $Course = $request->course_id;
        $Category->Course()->attach($Course);
        return redirect()->back()->with('success', 'Category Courses successfully stored');
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
        $Category          = QueryBuilder::for(Category::class)->find($id);
        $Course            = QueryBuilder::for(Course::class)->get();
        $checkedCourse = collect($Category->Course)->pluck('id')->toArray();
        return view('admin.category-course.edit-category-course', compact('Course','Category','checkedCourse'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Category       = Category::find($id);
        $Category->name = $request->name;
        $Category->save();

        $Course = $request->course_id;
        $Category->Course()->sync($Course);
        return redirect()->back()->with('success', 'Category Courses successfully updated');
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
