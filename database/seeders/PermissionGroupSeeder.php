<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\PermissionGroup;
class PermissionGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PermissionGroup::insert([
            [
               "name" => "Technology Permission", 
               "slug" => Str::slug("technology permission", '-'), 
            ], 

            [
               "name" => "Course Permission", 
               "slug" => Str::slug("course permission", '-'), 
            ], 
            [
                "name" => "Course Technology Permission", 
                "slug" => Str::slug("course technology permission", '-'), 
            ], 
            [
                "name" => "Category Course Permission", 
                "slug" => Str::slug("category course permission", '-'), 
            ], 
            [
                "name" => "Learning Permission", 
                "slug" => Str::slug("learning permission", '-'), 
            ], 
            [
                "name" => "Title Permission", 
                "slug" => Str::slug("title permission", '-'), 
            ], 
            [
                "name" => "Title detail Permission", 
                "slug" => Str::slug("title detail permission", '-'), 
            ], 
            [
                "name" => "Enquiry Permission", 
                "slug" => Str::slug("enquiry permission", '-'), 
            ], 
            [
                "name" => "Payment Permission", 
                "slug" => Str::slug("payment permission", '-'), 
            ], 
            [
                "name" => "User Permission", 
                "slug" => Str::slug("user permission", '-'), 
            ], 
            [
                "name" => "Batch Permission", 
                "slug" => Str::slug("batch permission", '-'), 
            ], 
            [
                "name" => "System Permission", 
                "slug" => Str::slug("system permission", '-'), 
            ], 
            [
                "name" => "Role Permission", 
                "slug" => Str::slug("role permission", '-'), 
            ], 
        ]);
    }
}
