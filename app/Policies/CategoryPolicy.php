<?php

namespace App\Policies;
use App\Helpers\Validate;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
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
    public function CreateCategoryCourse(){
        return $this->getPermissions($permission = "create-category-course");
    }
    public function editCategoryCourse(){
        return $this->getPermissions($permission = "edit-category-course");
    }
    public function ViewCategoryCourse(){
        return $this->getPermissions($permission = "view-category-course");
    }
}
