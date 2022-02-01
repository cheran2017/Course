<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RolePermissionFactory extends Factory
{
     /**
     * Define the model's default state.
     *
     * @return array
     */
    public $value = 1;
    public function definition()
    {
        return [
               'role_id' => "1",            
               'permission_id' => $this->value++,            
        ];
    }
}
