<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Helpers\Validate;

class BatchPolicy
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
    public function CreateBatch(){
        return $this->getPermissions($permission = "create-batch");
    }
    public function editBatch(){
        return $this->getPermissions($permission = "edit-batch");
    }
    public function ViewBatch(){
        return $this->getPermissions($permission = "view-batch");
    }
    public function DeleteBatch(){
        return $this->getPermissions($permission = "delete-batch");
    }
    public function ViewBatchUser(){
        return $this->getPermissions($permission = "view-batch-users");
    }
}
