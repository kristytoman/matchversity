<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use DatabaseNames;

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
                        DatabaseNames::COUNTRY_ID_COLUMN => $country->code,
                        DatabaseNames::REGION_COLUMN => $region->name,
                        DatabaseNames::CONTINENT_COLUMN => $continent->name
                    ]);
                }
                DB::table(DatabaseNames::COUNTRIES_TABLE)->insert($countries);
            }
        }
    }
}
