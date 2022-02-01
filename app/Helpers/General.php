<?php

namespace App\Helpers;
use App\Models\Enquiry;
use App\Models\Course;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\General;
use Spatie\QueryBuilder\QueryBuilder;

trait General{

    public function EnquiryId(){

        $enquiry_id   = "UE".rand();
        $check_id = Enquiry::where('enquiry_id',$enquiry_id)->first();

        if($check_id){
            $this->EnquiryId();
        }
        else{
            return $enquiry_id;
        }
    }

    public function ReferenceNumber(){

        $invoice_number   = "IN".rand();
        $check_rf = Payment::where('tax_number',$invoice_number)->first();

        if($check_rf){
            $this->ReferenceNumber();
        }
        else{
            return $invoice_number;
        }
    }
    public function CheckUser($id){
        $CheckEnquiry  = QueryBuilder::for(Enquiry::class)->where('user_id',auth()->user()->id)->where('course_id',$id)->where('status',"!=","4")->first();
        return $CheckEnquiry;
    }

    public function GetEnquiryList($status){
        $Enquiry = QueryBuilder::for(Enquiry::class)->orderBy('id', 'desc')->where('status',$status)->with('Payment')->get();
        return view('admin.payment.enquiry-list', compact('Enquiry'));
    }
    public function UpdateStatus($id, $status){
        $UserStatus = User::find($id);
        $UserStatus->status = $status;
        $UserStatus->save();
        return redirect()->back()->with('success', 'Status successfully Updated');
    }

    public function GetPendingList(){
        $Enquiry = QueryBuilder::for(Enquiry::class)->where('status','!=',"4")->where('status','!=',"3")->orderBy('id', 'desc')->with('Payment')->get();
        $EnquiryId = [];
        foreach ($Enquiry as $item){
            $data = 0;
            foreach ($item->Payment as $value){
                  $data += $value->amount;
            }
            if($data < $item->Course->price)
             array_push($EnquiryId,$item->enquiry_id);

        }
        $GetEnquiry = Enquiry::whereIn('enquiry_id',$EnquiryId)->with('Payment')->get();
        return $GetEnquiry;
    }
    
 

}