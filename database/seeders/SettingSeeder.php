<?php

namespace Database\Seeders;
use App\Models\Setting;

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'name' => "Admin",            
            'background_title' => "Title Will Come Here",            
            'background_description' => "Description Will Come Here",            
            'background_header' => "Header Will Come Here",            
        ]);

    }
}
