<?php

use Illuminate\Database\Seeder;

class CourseSessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\CourseSession::truncate();  
        $faker = Faker\Factory::create();
        $courseId = 1;
        
        for ($i=1; $i <= 12; $i++) { 
            
            if($i%3 == 0){
                $courseId++;
            }

            $userCourseSessions[] = [ 
                        'course_id' => $courseId,
                        'user_id' => 1, 
                        'score' => $i+50, 
                        'created_at' => '2019-12-'.sprintf("%02d", $i).' 14:32:40', 
                        'updated_at' => '2019-12-'.sprintf("%02d", $i).' 14:32:40',
                    ];
        }
        
        App\Models\CourseSession::insert($userCourseSessions);

        factory(App\Models\CourseSession::class, 300)->create();
    }
}
