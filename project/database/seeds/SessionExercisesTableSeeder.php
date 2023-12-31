<?php

use Illuminate\Database\Seeder;

class SessionExercisesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	App\Models\SessionExercise::truncate();  

        $faker = Faker\Factory::create();
        $categoryId = 1;
        $sessionId = 1;

        for ($i=1; $i < 100; $i++) { 
            
            if($i%3 == 0){
                $categoryId++;
            }

            if($i%4 == 0){
                $sessionId++;
            }

            $userCourseSessions[] = [ 
                'name' => 'Exercise '.$i,
                'score' => $sessionId + $categoryId + 20,
                'session_id' => $sessionId,
                'category_id' => $categoryId, 
                'created_at' => '2019-12-'.sprintf("%02d", 12).' 14:32:40', 
                'updated_at' => '2019-12-'.sprintf("%02d", 12).' 14:32:40',
            ];
        }
        
        App\Models\SessionExercise::insert($userCourseSessions);

    	factory(App\Models\SessionExercise::class, 2000)->create();
    }
}
