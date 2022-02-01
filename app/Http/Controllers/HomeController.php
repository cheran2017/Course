<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Course;
use App\Models\Country;
use App\Models\User;
use App\Models\Degree;
use App\Models\College;
use App\Models\Specializtion;
use App\Models\UserUgDegree;
use App\Models\UserPgDegree;
use App\Models\Enquiry;
use App\Models\Category;
use App\Models\Technology;
use App\Http\Requests\EducationRequest;
use Carbon\Carbon;
use App\Helpers\General;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class HomeController extends Controller
{

    use General;

    public function Dashboard(){
        if(auth()->user()->role != "0"){
            return redirect(route('admin-dashboard'));
        }
        return view('dashboard');
    }
    public function UserProfile(){
        if(auth()->user()->role != "0"){
            return redirect(route('admin-profile'));
        }
        return view('user-profile');
    }
    public function UpdateProfile(Request $request){
        $User = User::find(auth()->user()->id);

        if($request->file('image') != null){
            $image  = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('assets/images/'),$image);
            $User->profile_photo_path = $image;
        }

        $User->name = $request->name;
        $User->email = $request->email;
        $User->save();
        return redirect()->back()->with('success', 'Profile Information Stored successfully');

    }
    public function test(){
        return view('test');
    }
    public function Index(){
        $Course      = QueryBuilder::for(Course::class)->get();
        $Category    = QueryBuilder::for(Category::class)->get();
        $Technology  = QueryBuilder::for(Technology::class)->get();
        $User        = QueryBuilder::for(User::class)->where("role","!=",1)->get()->count();
        $Enquiry     = QueryBuilder::for(Enquiry::class)->get()->count();
        return view('welcome', compact('Course','Category', 'Technology','User','Enquiry'));
    }
    public function register(){
        $Country      = QueryBuilder::for(Country::class)->get();
        return view('auth.register', compact('Country'));
    }
    public function EducationDetail(){
        $GetEducation   = QueryBuilder::for(UserUgDegree::class)->where('user_id',auth()->user()->id)->first();
        $GetPgEducation = QueryBuilder::for(UserPgDegree::class)->where('user_id',auth()->user()->id)->first();
        return view('education-detail', compact('GetEducation','GetPgEducation'));
    }
    public function ViewCourse($id){
        $Course        = QueryBuilder::for(Course::class)->find($id);
        $CheckEnquiry  = $this->CheckUser($id);
        return view('view-course', compact('Course','CheckEnquiry'));
    }

    public function Enquiry(Request $request, $id){
    
        $Enquiry             = new Enquiry;
        $Enquiry->user_id    = auth()->user()->id;
        $Enquiry->course_id  = $id;
        $Enquiry->status     = 0;
        $Enquiry->date       = Carbon::today()->toDateString();
        $Enquiry->time       = Carbon::now()->toTimeString();
        $Enquiry->enquiry_id = $this->EnquiryId();
        $Enquiry->save();
        return redirect()->back()->with('success', 'Enquiry Submitted successfully');
      
    }
    public function ViewEnquiry(){
        if(auth()->user()->role != "0"){
            return redirect(route('admin-dashboard'));
        }
        $EnquiryCourses    = QueryBuilder::for(Enquiry::class)->where('user_id',auth()->user()->id)->get();
        return view('view-enquiry', compact('EnquiryCourses'));
    }

    public function SearchAutocomplete(Request $request){
        if($request->ajax()) {
          
            $data = Course::where('name', 'LIKE', $request->course.'%')
                ->get();
           
            $output = '';
           
            if (count($data)>0) {
              
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
              
                foreach ($data as $row){
                   
                    $output .= '<li class="list-group-item">'.$row->name.'</li>';
                }
              
                $output .= '</ul>';
            }
            else {
             
                $output .= '<li class="list-group-item">'.'No results'.'</li>';
            }
           
            return $output;
        }
    }


    public function SearchResult(Request $request){
        $Course      = QueryBuilder::for(Course::class)->get();
        $Category    = QueryBuilder::for(Category::class)->get();
        $Technology  = QueryBuilder::for(Technology::class)->get();
        $User        = QueryBuilder::for(User::class)->where("role","!=",1)->get()->count();
        $Enquiry     = QueryBuilder::for(Enquiry::class)->get()->count();
        $Search = $request->course_name;
        $SearchResult = Course::where('name', $Search)->get();
        return view('search-results', compact('SearchResult','Search','Course','Category', 'Technology','User','Enquiry'));
    }

    public function SearchCategory($id){
        $Course      = QueryBuilder::for(Course::class)->get();
        $Category    = QueryBuilder::for(Category::class)->get();
        $Technology  = QueryBuilder::for(Technology::class)->get();
        $User        = QueryBuilder::for(User::class)->where("role","!=",1)->get()->count();
        $Enquiry     = QueryBuilder::for(Enquiry::class)->get()->count();
        $CourseCategory    = QueryBuilder::for(Category::class)->allowedIncludes('Course')->find($id);
        return view('search-category', compact('Course','Category', 'Technology','User','Enquiry','CourseCategory'));

    }
    // public function Filter(Request $request){
    //     if($request->ajax()) 
    //     {
    //         $Course      = QueryBuilder::for(Course::class)->where('price',$request->price)->get();

    //     }
    //     else
    //     {
    //         $Course      = QueryBuilder::for(Course::class)->get();

    //     }
    // }
   
    public function AllCourses(Request $request){

        return view('all-courses');
     
    }
}
