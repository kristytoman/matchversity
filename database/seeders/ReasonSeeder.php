<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use DatabaseNames;

class ReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reasons')->insert([
            [
                'description_cz' => 'Jiný důvod',
                'description_en' => 'Other reason',
                'is_verified' => true 
            ],
            [ 
                'description_cz' => 'Předmět byl zrušen univerzitou', 
                'description_en' => 'Course was cancelled by university',
                'is_verified' => true 
            ],
            [ 
                'description_cz' => 'Předmět byl určen pro magisterské studium', 
                'description_en' => 'Course was itended for master studies only',
                'is_verified' => true 
            ],
            [ 
                'description_cz' => 'Student nesplňoval prerekvizity předmětu', 
                'description_en' => 'Student didn\'t meet course preconditions',
                'is_verified' => true 
            ],
            [ 
                'description_cz' => 'Předmět byl moc obtížný', 
                'description_en' => 'Course was too dificult',
                'is_verified' => true
            ],
            [ 
                'description_cz' => 'Předmět neseděl do studentova rozvrhu',
                'description_en' => 'Course didn\'t fit into student\'s timetable' ,
                'is_verified' => true 
            ],
            [ 
                'description_cz' => 'Předmět neodpovídal popisu', 
                'description_en' => 'Course didn\'t match the description', 
                'is_verified' => true 
            ]
        ]);
    }
}
