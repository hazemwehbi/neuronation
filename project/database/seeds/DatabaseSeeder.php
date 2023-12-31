<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        $this->call(UsersTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CourseSessionsTableSeeder::class);
        $this->call(SessionExercisesTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
