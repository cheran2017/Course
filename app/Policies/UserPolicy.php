<?php

namespace App\Policies;
use App\Helpers\Validate;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    public function ViewUserList(){
        return $this->getPermissions($permission = "view-users-list");
    }
    public function ChangeUserStatus(){
        return $this->getPermissions($permission = "change-users-status");
    }
    public function ViewUserInformation(){
        return $this->getPermissions($permission = "view-user-information");
    }
    public function ViewUsersCourse(){
        return $this->getPermissions($permission = "view-users-course");
    }
    public function CreateAdminUser(){
        return $this->getPermissions($permission = "create-admin-users");
    }
    public function ViewAdminUser(){
        return $this->getPermissions($permission = "view-admin-users");
    }
    public function EditAdminUser(){
        return $this->getPermissions($permission = "edit-admin-users");
    }
    public function DeleteAdminUser(){
        return $this->getPermissions($permission = "delete-admin-users");
    }

    public function CheckAdmin(){
        if(auth()->user()->role != 0){
        return true;
        }
        abort(403);
    }
}
