<?php

namespace App\Policies;
use App\Helpers\Validate;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
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
    public function CreateRolePermission(){
        return $this->getPermissions($permission = "create-role-permission");
    }
    public function ViewRolePermission(){
        return $this->getPermissions($permission = "view-role-permission");
    }
    public function EditRolePermission(){
        return $this->getPermissions($permission = "Edit-role-permission");
    }
}
