<?php

namespace App\Helpers;
use App\Models\Enquiry;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Learning;
use App\Models\CourseTechnology;
use App\Models\CourseTitle;
use App\Models\CourseTitleDetail;
use App\Models\Technology;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Helpers\Validate;
use Spatie\QueryBuilder\QueryBuilder;

trait Validate{
  
    public function ValidateCourse($id){
        $checkLearning         = QueryBuilder::for(Learning::class)->where('course_id',$id)->first();
        $checkCourseTechnology = QueryBuilder::for(CourseTechnology::class)->where('course_id',$id)->first();
        $checkCourseTitle      = QueryBuilder::for(CourseTitle::class)->where('course_id',$id)->first();

        if($checkLearning || $checkCourseTechnology || $checkCourseTitle){
            return redirect()->back()->with('success', 'Course already used in Learnings');
        }
        else{
            Course::find($id)->delete();
            return redirect()->back()->with('success', 'Course successfully Deleted');
        }
    }

    public function ValidateTechnology($id){
        $checkTechnology   = QueryBuilder::for(CourseTechnology::class)->where('course_id',$id)->first();
        if($checkTechnology){
            return redirect()->back()->with('success', 'Technology already used Course Technology');
        }
        else{
            Technology::find($id)->delete();
            return redirect()->back()->with('success', 'Technology successfully Deleted');
        }
    }

    public function ValidateCourseTechnology($id){
        $checkCourseTitleDetail   = QueryBuilder::for(CourseTitleDetail::class)->where('course_title_id',$id)->first();
        if($checkCourseTitleDetail){
            return redirect()->back()->with('success', 'Course Title already used in Course Title Description');
        }
        else{
            CourseTitle::find($id)->delete();
            return redirect()->back()->with('success', 'Course successfully Deleted');
        }
    }
    public function ValidatePayment($id, $status){
        $EnquiryUpdate = Enquiry::find($id);
        $TotalAmount   = $EnquiryUpdate->Course->price;
        $PaymentSum  = QueryBuilder::for(Payment::class)->where("enquiry_id",$EnquiryUpdate->enquiry_id)->get()->sum('amount');
        
        if($status == 3 && $PaymentSum-$TotalAmount == 0){
            $EnquiryUpdate->status = $status;
            $EnquiryUpdate->save();
            return redirect()->back()->with('success', 'Status successfully Updated');
        }
        elseif ($status != 3){
            $EnquiryUpdate->status = $status;
            $EnquiryUpdate->save();
            return redirect()->back()->with('success', 'Status successfully Updated');
        }
        else{
            return redirect()->back()->with('success', 'Full Payment Not Paid');
 
        }
       

    }

    public function getPermissions($permission){
        $Role = Role::find(auth()->user()->role);
        $GetPermissions = $Role->permissions()->get()->toArray();
        $colection = collect($GetPermissions); 
        $UserPermissions = $colection->pluck('name')->toArray();
        $validatePermission = in_array($permission,$UserPermissions);
        return $validatePermission;
    }

}