<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Category::truncate();
        
        DB::table('categories')->insert([
                ['name' => 'Android'],
                ['name' => 'IOS'],
                ['name' => 'Hybrid'],
                ['name' => '.NET'],
                ['name' => 'LAMP Stack'],
                ['name' => 'MEAN Stack'],
                ['name' => 'MERN Stack'],
                ['name' => 'Photoshop'],
                ['name' => 'Blog writer'],
                ['name' => 'Copy writer'],
                ['name' => 'Automated Testing'],
                ['name' => 'Conventional Testing'],
            ]
        );
    }
}
