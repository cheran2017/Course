<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Helpers\Validate;

class TechnologyPolicy
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

    public function CreateTechnology(){
        return $this->getPermissions($permission = "create-technology");
    }
    public function EditTechnology(){
        return $this->getPermissions($permission = "edit-technology");
    }
    public function ViewTechnology(){
        return $this->getPermissions($permission = "view-technology");
    }
    public function DeleteTechnology(){
        return $this->getPermissions($permission = "delete-technology");
    }

}
