<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Helpers\Validate;

class CoursePolicy
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
    public function CreateCourse(){
        return $this->getPermissions($permission = "create-course");
    }
    public function EditCourse(){
        return $this->getPermissions($permission = "edit-course");
    }
    public function ViewCourse(){
        return $this->getPermissions($permission = "view-course");
    }
    public function DeleteCourse(){
        return $this->getPermissions($permission = "delete-course");
    }

}
