<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\PermissionGroup;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technology_slug_id = PermissionGroup::where('slug','technology-permission')->first()->id;
        $course_slug_id = PermissionGroup::where('slug','course-permission')->first()->id;
        $course_technology_slug_id = PermissionGroup::where('slug','course-technology-permission')->first()->id;
        $category_course_slug_id = PermissionGroup::where('slug','category-course-permission')->first()->id;
        $learning_slug_id = PermissionGroup::where('slug','learning-permission')->first()->id;
        $title_slug_id = PermissionGroup::where('slug','title-permission')->first()->id;
        $title_detail_slug_id = PermissionGroup::where('slug','title-detail-permission')->first()->id;
        $enquiry_slug_id = PermissionGroup::where('slug','enquiry-permission')->first()->id;
        $payment_slug_id = PermissionGroup::where('slug','payment-permission')->first()->id;
        $user_slug_id = PermissionGroup::where('slug','user-permission')->first()->id;
        $batch_slug_id = PermissionGroup::where('slug','batch-permission')->first()->id;
        $system_slug_id = PermissionGroup::where('slug','system-permission')->first()->id;
        $role_slug_id = PermissionGroup::where('slug','role-permission')->first()->id;

        Permission::insert([
            //technology
            ["name" => "create-technology", "permission_group_id" => $technology_slug_id        ], 
            ["name" => "view-technology",   "permission_group_id" => $technology_slug_id        ], 
            ["name" => "edit-technology",   "permission_group_id" => $technology_slug_id        ], 
            ["name" => "delete-technology", "permission_group_id" => $technology_slug_id       ], 

            //Course
            ["name" => "create-course",     "permission_group_id" => $course_slug_id          ], 
            ["name" => "view-course",       "permission_group_id" => $course_slug_id         ], 
            ["name" => "edit-course",       "permission_group_id" => $course_slug_id        ], 
            ["name" => "delete-course",     "permission_group_id" => $course_slug_id         ], 

             //Course technology
            ["name" => "create-course-technology",   "permission_group_id" => $course_technology_slug_id     ], 
            ["name" => "view-course-technology",     "permission_group_id" => $course_technology_slug_id     ], 
            ["name" => "edit-course-technology",     "permission_group_id" => $course_technology_slug_id     ], 

            //category Course 
            ["name" => "create-category-course",     "permission_group_id" => $category_course_slug_id     ], 
            ["name" => "view-category-course",       "permission_group_id" => $category_course_slug_id     ], 
            ["name" => "edit-category-course",       "permission_group_id" => $category_course_slug_id     ], 

            //learning
            ["name" => "create-learning",            "permission_group_id" => $learning_slug_id     ], 
            ["name" => "view-learning",              "permission_group_id" => $learning_slug_id     ], 
            ["name" => "edit-learning",              "permission_group_id" => $learning_slug_id     ], 
            ["name" => "delete-learning",            "permission_group_id" => $learning_slug_id     ], 

            //title
            ["name" => "create-title",  "permission_group_id" => $title_slug_id     ], 
            ["name" => "view-title",    "permission_group_id" => $title_slug_id     ], 
            ["name" => "edit-title",    "permission_group_id" => $title_slug_id     ], 
            ["name" => "delete-title",    "permission_group_id" => $title_slug_id     ], 

            //title detail
            ["name" => "create-title-detail",  "permission_group_id" => $title_detail_slug_id     ], 
            ["name" => "view-title-detail",    "permission_group_id" => $title_detail_slug_id     ], 
            ["name" => "edit-title-detail",    "permission_group_id" => $title_detail_slug_id     ], 
            ["name" => "delete-title-detail",    "permission_group_id" => $title_detail_slug_id     ], 

            //enquiry
            ["name" => "view-enquiry",    "permission_group_id" => $enquiry_slug_id     ], 
            ["name" => "change-enquiry-status",    "permission_group_id" => $enquiry_slug_id     ], 

            //payment
            ["name" => "payment-update",  "permission_group_id" => $payment_slug_id     ], 
            ["name" => "payment-pending",    "permission_group_id" => $payment_slug_id     ], 
            ["name" => "payment-details",    "permission_group_id" => $payment_slug_id     ], 
            ["name" => "payment-history",    "permission_group_id" => $payment_slug_id     ], 

            //users
            ["name" => "view-users-list",  "permission_group_id" => $user_slug_id     ], 
            ["name" => "change-users-status",    "permission_group_id" => $user_slug_id     ], 
            ["name" => "view-user-information",    "permission_group_id" => $user_slug_id     ], 
            ["name" => "view-users-course",    "permission_group_id" => $user_slug_id     ], 

            //title detail
            ["name" => "create-batch",  "permission_group_id" => $batch_slug_id     ], 
            ["name" => "view-batch",    "permission_group_id" => $batch_slug_id     ], 
            ["name" => "edit-batch",    "permission_group_id" => $batch_slug_id     ], 
            ["name" => "delete-batch",    "permission_group_id" => $batch_slug_id     ], 
            ["name" => "view-batch-users",    "permission_group_id" => $batch_slug_id     ], 

            ["name" => "manage-system-settings",    "permission_group_id" => $system_slug_id     ], 

            ["name" => "manage-profile-information",    "permission_group_id" => $system_slug_id     ], 

            //role permission
            ["name" => "create-role-permission",  "permission_group_id" => $role_slug_id     ], 
            ["name" => "view-role-permission",    "permission_group_id" => $role_slug_id     ], 
            ["name" => "edit-role-permission",    "permission_group_id" => $role_slug_id     ], 

            ["name" => "create-admin-users",    "permission_group_id" => $user_slug_id     ], 
            ["name" => "view-admin-users",      "permission_group_id" => $user_slug_id     ], 
            ["name" => "edit-admin-users",      "permission_group_id" => $user_slug_id     ], 
            ["name" => "delete-admin-users",      "permission_group_id" => $user_slug_id     ], 

        ]);
    }
}
