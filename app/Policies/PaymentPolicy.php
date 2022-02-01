<?php

namespace App\Policies;
use App\Helpers\Validate;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentPolicy
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
    public function PaymentUpdate(){
        return $this->getPermissions($permission = "payment-update");
    }
    public function PaymentDetail(){
        return $this->getPermissions($permission = "payment-pending");
    }
    public function PaymentHistory(){
        return $this->getPermissions($permission = "payment-history");
    }
    public function PaymentPending(){
        return $this->getPermissions($permission = "payment-details");
    }
}
