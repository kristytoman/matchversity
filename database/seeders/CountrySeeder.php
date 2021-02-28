<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = json_decode(file_get_contents("resources\json\countries.json"), false);
        foreach ($json->continents as $continent) {
            foreach ($continent->regions as $region) {
                $countries = [];
                foreach ($region->countries as $country) {
                    array_push($countries, [ 
                        'id' => $country->code,
                        'region' => $region->name,
                        'continent' => $continent->name
                    ]);
                }
                DB::table('countries')->insert($countries);
            }
        }
    }
}
