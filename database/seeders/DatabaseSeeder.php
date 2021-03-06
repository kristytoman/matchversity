<?php

namespace Database\Seeders;

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
        $this->call([
            CountrySeeder::class,
            ReasonSeeder::class,
            UniversitySeeder::class,
            AdminSeeder::class,
            FieldSeeder::class,
            CourseSeeder::class,
            FieldCourseSeeder::class,
            GroupSeeder::class
        ]);
    }
}
