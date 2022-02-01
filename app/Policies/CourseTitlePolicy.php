<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Helpers\Validate;

class CourseTitlePolicy
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

    public function CreateCourseTitle(){
        return $this->getPermissions($permission = "create-title");
    }
    public function editCourseTitle(){
        return $this->getPermissions($permission = "edit-title");
    }
    public function ViewCourseTitle(){
        return $this->getPermissions($permission = "view-title");
    }
    public function DeleteCourseTitle(){
        return $this->getPermissions($permission = "delete-title");
    }
}
