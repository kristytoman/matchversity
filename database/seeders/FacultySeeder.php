<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use DatabaseNames;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faculties')->insert([
            [
                'id' => 'FAI',
                'name' => 'Faculty of Applied Informatics'
            ],
            [
                'id' => 'FAM',
                'name' => 'Faculty of Management and Economics'
            ],
            [
                'id' => 'FHS',
                'name' => 'Faculty of Humanities'
            ],
            [
                'id' => 'FLK',
                'name' => 'Faculty of Logistics and Crisis Management'
            ],
            [
                'id' => 'FMK',
                'name' => 'Faculty of Multimedia Communications'
            ],
            [
                'id' => 'FT',
                'name' => 'Faculty of Technology'
            ]
        ]);
    }
}
