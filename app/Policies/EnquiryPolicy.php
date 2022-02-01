<?php

namespace App\Policies;
use App\Helpers\Validate;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EnquiryPolicy
{
    use Validate;
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function ViewEnquiry(){
        return $this->getPermissions($permission = "view-enquiry");
    }
    public function ChangeEnquiryStatus(){
        return $this->getPermissions($permission = "change-enquiry-status");
    }
    
}
