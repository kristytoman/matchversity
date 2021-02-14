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
        DB::table(DatabaseNames::REASONS_TABLE)->insert([
            [
                DatabaseNames::DESCRIPTION_COLUMN => 'Jiný důvod', 
                DatabaseNames::IS_VERIFIED_COLUMN => true 
            ],
            [ 
                DatabaseNames::DESCRIPTION_COLUMN => 'Předmět byl zrušen univerzitou', 
                DatabaseNames::IS_VERIFIED_COLUMN => true 
            ],
            [ 
                DatabaseNames::DESCRIPTION_COLUMN => 'Předmět byl určen pro magisterské studium', 
                DatabaseNames::IS_VERIFIED_COLUMN => true 
            ],
            [ 
                DatabaseNames::DESCRIPTION_COLUMN => 'Student nesplňoval prerekvizity předmětu', 
                DatabaseNames::IS_VERIFIED_COLUMN => true 
            ],
            [ 
                DatabaseNames::DESCRIPTION_COLUMN => 'Předmět byl moc obtížný', 
                DatabaseNames::IS_VERIFIED_COLUMN => true
            ],
            [ 
                DatabaseNames::DESCRIPTION_COLUMN => 'Předmět neseděl do studentova rozvrhu',
                DatabaseNames::IS_VERIFIED_COLUMN => true 
            ],
            [ 
                DatabaseNames::DESCRIPTION_COLUMN => 'Předmět neodpovídal popisu', 
                DatabaseNames::IS_VERIFIED_COLUMN => true 
            ]
        ]);
    }
}
