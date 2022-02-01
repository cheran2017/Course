<?php

namespace App\Policies;
use App\Helpers\Validate;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LearningPolicy
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
    public function CreateLearning(){
        return $this->getPermissions($permission = "create-learning");
    }
    public function editLearning(){
        return $this->getPermissions($permission = "edit-learning");
    }
    public function ViewLearning(){
        return $this->getPermissions($permission = "view-learning");
    }
    public function DeleteLearning(){
        return $this->getPermissions($permission = "delete-learning");
    }
    
}
