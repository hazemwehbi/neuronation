<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Course::truncate();  
        
        DB::table('courses')->insert(	
        [	['name' => 'Web Develoment' ],
    		['name' => 'Mobile Develoment'],
    		['name' => 'UI/UX Designer'],
    		['name' => 'Content Writer'],
    		['name' => 'Qaulity Assurance'],
    	]);
    }
}
