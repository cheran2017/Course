<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Technology;
use App\Models\Course;
use App\Models\Enquiry;
use App\Models\Payment;
use App\Models\User;
use App\Models\Batch;
use App\Models\Setting;
use App\Models\CourseTechnology;
use App\Http\Requests\TechnologyRequest;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\CourseTechnologyRequest;
use App\Http\Requests\PaymentRequest;
use App\Helpers\General;
use App\Helpers\Validate;
use Carbon\Carbon;

class AdminController extends Controller
{
    use General;
    use Validate;

    public function AdminDashboard(){
        $Enquiry      = QueryBuilder::for(Enquiry::class)->orderBy('id', 'desc')->where('created_at', '>=', Carbon::today())->get();        
        $EnquiryCount = QueryBuilder::for(Enquiry::class)->count();
        $UserCount    = QueryBuilder::for(User::class)->count();
        $Course       = QueryBuilder::for(Course::class)->get();
        $CourseCount  = QueryBuilder::for(Course::class)->count();
        $PaymentCount = QueryBuilder::for(Payment::class)->get()->sum('amount');
        return view('admin.dashboard',compact('EnquiryCount', 'UserCount', 'PaymentCount', 'Enquiry', 'Course','CourseCount'));
    }
    public function AdminProfile(){
        return view('admin.admin-profile');
    }
    public function EnquiryList($status){
       return $this->GetEnquiryList($status);
    }
    public function EnquiryStatus($id ,$status){
        return $this->ValidatePayment($id, $status);
    }
    public function PaymentView(){
        $GetEnquiry = $this->GetPendingList();
        return view('admin.payment.payment-check', compact('GetEnquiry'));
    }
    public function PaymentUpdate($id){
        $Batch            = QueryBuilder::for(Batch::class)->get();
        $Enquiry          = QueryBuilder::for(Enquiry::class)->find($id);
        $CollectEnquiries = collect($Enquiry->Payment);
        $CollectPayments  = collect($CollectEnquiries)->pluck("enquiry_id")->unique();
        $PaymentModes          = QueryBuilder::for(Payment::class)->whereIn("enquiry_id",$CollectPayments)->get()->pluck('payment_mode')->toArray();
        return view('admin.payment.payment-update', compact('Enquiry', 'Batch','PaymentModes'));
    }

    public function StorePayment(PaymentRequest $request){

        $Enquiry = QueryBuilder::for(Enquiry::class)->find($request->enquiry_id);
        $PaymentSum = $Enquiry->Payment->sum('amount');

         if($Enquiry->Course->price < ($PaymentSum + $request->amount)){
            return redirect()->back()->with('fail', 'Entered Amount is higher than Course Price');
         }
         else{
            if($request->batch_id != null){
                $Enquiry           = QueryBuilder::for(Enquiry::class)->find($Enquiry->id);
                $Enquiry->batch_id = $request->batch_id;
                $Enquiry->save();
            }
             
            $Payment                   = new Payment;
            $Payment->enquiry_id       = $Enquiry->enquiry_id;
            $Payment->payment_method   = $request->payment_method;
            $Payment->payment_mode     = $request->payment_mode;
            $Payment->amount           = $request->amount;
            $Payment->tax_number       = $this->ReferenceNumber();
            $Payment->reference_number = $request->reference_number;
            $Payment->save();

            $Enquiry->status  = "2";
            $Enquiry->save();

            return redirect()->back()->with('success', 'Payment successfully Updated');
         }
    }
    public function ViewPayment($enquiry_id){
        $Enquiry    = QueryBuilder::for(Enquiry::class)->where('enquiry_id' ,$enquiry_id)->first();
        $Payment    = QueryBuilder::for(Payment::class)->where('enquiry_id', $enquiry_id)->orderBy('id', 'desc')->get();
        $PaymentSum = QueryBuilder::for(Payment::class)->where('enquiry_id', $enquiry_id)->get()->sum('amount');
        return view('admin.payment.view-payment', compact('Payment','Enquiry','PaymentSum'));
    }
    public function UsersList(){
        $User = QueryBuilder::for(User::class)->get();
        return view('admin.users.users-list', compact('User'));
    }
    public function ViewUser($id){
        $User = QueryBuilder::for(User::class)->find($id);
        return view('admin.users.view-user', compact('User'));
    }

    public function UserStatus($id ,$status){
      return $this->UpdateStatus($id, $status);
    }

    public function UserCourse(){
        $Enquiry = QueryBuilder::for(Enquiry::class)->with('User','Course')->orderBy('id', 'desc')->where('status',"2")->Orwhere('status',"3")->get();
        return view('admin.users.users-course', compact('Enquiry'));

    }

    public function PaymentDetails(){
        $Enquiry      = QueryBuilder::for(Enquiry::class)->get();        
        return view('admin.payment.payment-details', compact('Enquiry'));

    }
    public function PendingPayment(){
        $GetEnquiry = $this->GetPendingList();
        return view('admin.payment.payment-pending', compact('GetEnquiry'));

    }
    public function PaymentHistory(){
        $Payment      = QueryBuilder::for(Payment::class)->orderBy('id', 'desc')->get();        
        return view('admin.payment.payment-history', compact('Payment'));
    }

    public function BatchUsers(){
        $Batch  = QueryBuilder::for(Batch::class)->with('Enquiry')->orderBy('id', 'desc')->get();       
        return view('admin.batch.batch-users', compact('Batch'));

    }
    public function ViewBatchUsers($id){
        $Batch  = QueryBuilder::for(Batch::class)->with('Enquiry')->find($id);       
        return view('admin.batch.view-batch-users', compact('Batch'));
    }
    public function Settings(){
        $Settings  = QueryBuilder::for(Setting::class)->first();   
        if($Settings){
            $Settings  = QueryBuilder::for(Setting::class)->first();   
            return view('admin.settings', compact('Settings'));
        }    
        $Settings = null;
        return view('admin.settings', compact('Settings'));
    }
    public function UpdateSettings(Request $request){
      
        $Settings = Setting::find(1);

        if($request->file('logo') != null){
            $logo  = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('assets/images/'),$logo);
            $Settings->logo = $logo;
        }
        if($request->file('background_image') != null){
            $background_image  = $request->file('background_image')->getClientOriginalName();
            $request->file('background_image')->move(public_path('assets/images/'),$background_image);
            $Settings->background_image = $background_image;
        }      
         if($request->file('background_centered_image') != null){
            $background_centered_image  = $request->file('background_centered_image')->getClientOriginalName();
            $request->file('background_centered_image')->move(public_path('assets/images/'),$background_centered_image);
            $Settings->background_centered_image = $background_centered_image;
        }
         if($request->file('login_background_image') != null){
            $login_background_image  = $request->file('login_background_image')->getClientOriginalName();
            $request->file('login_background_image')->move(public_path('assets/images/'),$login_background_image);
            $Settings->login_background_image = $login_background_image;
        }
        $Settings->name = $request->name;
        $Settings->background_title = $request->background_title;
        $Settings->background_header = $request->background_header;
        $Settings->background_description = $request->background_description;
        $Settings->save();

        return redirect()->back()->with('success', 'Settings successfully Updated');

    }

  
}
