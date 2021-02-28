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
                'description' => 'Jiný důvod', 
                'is_verified' => true 
            ],
            [ 
                'description' => 'Předmět byl zrušen univerzitou', 
                'is_verified' => true 
            ],
            [ 
                'description' => 'Předmět byl určen pro magisterské studium', 
                'is_verified' => true 
            ],
            [ 
                'description' => 'Student nesplňoval prerekvizity předmětu', 
                'is_verified' => true 
            ],
            [ 
                'description' => 'Předmět byl moc obtížný', 
                'is_verified' => true
            ],
            [ 
                'description' => 'Předmět neseděl do studentova rozvrhu',
                'is_verified' => true 
            ],
            [ 
                'description' => 'Předmět neodpovídal popisu', 
                'is_verified' => true 
            ]
        ]);
    }
}
