<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Helpers\Validate;

class CourseTitleDetailPolicy
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

    public function CreateCourseTitleDetail(){
        return $this->getPermissions($permission = "create-title-detail");
    }
    public function editCourseTitleDetail(){
        return $this->getPermissions($permission = "edit-title-detail");
    }
    public function ViewCourseTitleDetail(){
        return $this->getPermissions($permission = "view-title-detail");
    }
    public function DeleteCourseTitleDetail(){
        return $this->getPermissions($permission = "delete-title-detail");
    }
}
