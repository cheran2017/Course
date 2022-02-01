<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Course;
use App\Models\Country;
use App\Models\Degree;
use App\Models\College;
use App\Models\Specializtion;
use App\Models\UserUgDegree;
use App\Models\UserPgDegree;
use App\Http\Requests\EducationRequest;

class UgDegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EducationRequest $request)
    {
        $Degree          = new Degree;
        $Degree->name    = $request->degree;
        if($request->file('degree_image')){
        $DegreeImage     = $request->file('degree_image')->getClientOriginalName();
        $request->file('degree_image')->move(public_path('assets/images/'),$DegreeImage);
        $Degree->image   = $DegreeImage;
        }
        $Degree->save();

        $Specializtion        = new Specializtion;
        $Specializtion->name  = $request->specializtion;
        if($request->file('specialization_image')){
        $SpecializtionImage   = $request->file('specialization_image')->getClientOriginalName();
        $request->file('specialization_image')->move(public_path('assets/images/'),$SpecializtionImage);
        $Specializtion->image = $SpecializtionImage;
        }
        $Specializtion->save();


        $College           = new College;
        $College->name     = $request->college;
        $College->location = $request->location;
        if($request->file('college_image')){
        $CollegeImage      = $request->file('college_image')->getClientOriginalName();
        $request->file('college_image')->move(public_path('assets/images/'),$CollegeImage);
        $College->image    = $CollegeImage;
        }
        $College->save();

        $UgDegree                   = new UserUgDegree;
        $UgDegree->user_id          = auth()->user()->id;
        $UgDegree->passed_out       = $request->passed_out;
        $UgDegree->studying_year    = $request->studying_year;
        $UgDegree->specializtion_id = $Specializtion->id;
        $UgDegree->college_id       = $College->id;
        $UgDegree->degree_id        = $Degree->id;
        $UgDegree->save();
        return redirect()->back()->with('success', 'Ug Degree successfully Updated');
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
        $GetDegree = UserUgDegree::find($id);
        return view('edit-ug-degree', compact('GetDegree'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EducationRequest $request, $id)
    {
        $Degree          = Degree::find($request->degree_id);
        $Degree->name    = $request->degree;
        if($request->file('degree_image')){
        $DegreeImage     = $request->file('degree_image')->getClientOriginalName();
        $request->file('degree_image')->move(public_path('assets/images/'),$DegreeImage);
        $Degree->image   = $DegreeImage;
        }
        $Degree->save();

        $Specializtion        = Specializtion::find($request->specialization_id);
        $Specializtion->name  = $request->specializtion;
        if($request->file('specialization_image')){
        $SpecializtionImage   = $request->file('specialization_image')->getClientOriginalName();
        $request->file('specialization_image')->move(public_path('assets/images/'),$SpecializtionImage);
        $Specializtion->image = $SpecializtionImage;
        }
        $Specializtion->save();


        $College           = College::find($request->college_id);
        $College->name     = $request->college;
        $College->location = $request->location;
        if($request->file('college_image')){
        $CollegeImage      = $request->file('college_image')->getClientOriginalName();
        $request->file('college_image')->move(public_path('assets/images/'),$CollegeImage);
        $College->image    = $CollegeImage;
        }
        $College->save();

        $UgDegree                   = UserUgDegree::find($id);
        $UgDegree->user_id          = auth()->user()->id;
        $UgDegree->passed_out       = $request->passed_out;
        $UgDegree->studying_year    = $request->studying_year;
        $UgDegree->specializtion_id = $Specializtion->id;
        $UgDegree->college_id       = $College->id;
        $UgDegree->degree_id        = $Degree->id;
        $UgDegree->save();
        return redirect()->back()->with('success', 'Ug Degree successfully Updated');
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
