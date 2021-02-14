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
        DB::table(DatabaseNames::FACULTIES_TABLE)->insert([
            [
                DatabaseNames::FACULTY_ID_COLUMN => 'FAI',
                DatabaseNames::NAME_COLUMN => 'Faculty of Applied Informatics'
            ],
            [
                DatabaseNames::FACULTY_ID_COLUMN => 'FAM',
                DatabaseNames::NAME_COLUMN => 'Faculty of Management and Economics'
            ],
            [
                DatabaseNames::FACULTY_ID_COLUMN => 'FHS',
                DatabaseNames::NAME_COLUMN => 'Faculty of Humanities'
            ],
            [
                DatabaseNames::FACULTY_ID_COLUMN => 'FLK',
                DatabaseNames::NAME_COLUMN => 'Faculty of Logistics and Crisis Management'
            ],
            [
                DatabaseNames::FACULTY_ID_COLUMN => 'FMK',
                DatabaseNames::NAME_COLUMN => 'Faculty of Multimedia Communications'
            ],
            [
                DatabaseNames::FACULTY_ID_COLUMN => 'FT',
                DatabaseNames::NAME_COLUMN => 'Faculty of Technology'
            ]
        ]);
    }
}
