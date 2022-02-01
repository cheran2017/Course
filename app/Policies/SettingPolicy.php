<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Helpers\Validate;

class SettingPolicy
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
    public function ManageSetting(){
        return $this->getPermissions($permission = "manage-system-settings");
    }
    public function ManageProfile(){
        return $this->getPermissions($permission = "manage-profile-information");
    }
}
