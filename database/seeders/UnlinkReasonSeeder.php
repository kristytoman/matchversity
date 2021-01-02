<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UnlinkReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unlink_reasons')->insert([
            [ 'reason' => 'Jiný důvod', 'verified' => true ],
            [ 'reason' => 'Předmět byl zrušen univerzitou', 'verified' => true ],
            [ 'reason' => 'Předmět byl určen pro magisterské studium', 'verified' => true ],
            [ 'reason' => 'Student nesplňoval prerekvizity předmětu', 'verified' => true ],
            [ 'reason' => 'Předmět byl moc obtížný', 'verified' => true ],
            [ 'reason' => 'Předmět neseděl do studentova rozvrhu', 'verified' => true ],
            [ 'reason' => 'Předmět neodpovídal popisu', 'verified' => true ]
        ]);
    }
}
