<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('universities')->insert([
            [
                'name' => 'University of Duisburg-Essen',
                'original_name' => 'UNIVERSITÄT DUISBURG-ESSEN',
                'native_name' => 'Universität Duisburg-Essen',
                'xchange' => 178,
                'web' => 'https://www.uni-due.de/en'
            ],
            [
                'name' => 'Boğaziçi University',
                'original_name' => 'Bogaziçi Üniversitesi',
                'native_name' => 'Boğaziçi Üniversitesi',
                'xchange' => 334,
                'web' => 'http://www.boun.edu.tr/en_US'
            ],
            [
                'name' => 'Polytechnic Institute of Porto',
                'original_name' => 'INSTITUTO POLITÉCNICO DO PORTO',
                'native_name' => 'Instituto Politécnico do Porto',
                'xchange' => 67,
                'web' => 'https://www.ipp.pt/?set_language=en'
            ],
            [
                'name' => 'Bezalel Academy of Arts and Design',
                'original_name' => 'BEZALEL ACADEMY OF ART AND DESIGN - JERUSALEM',
                'native_name' => 'Bezalel Academy of Arts and Design',
                'xchange' => 254,
                'web' => 'http://www.bezalel.ac.il/en/'
            ],
            [
                'name' => 'University of Malaya',
                'original_name' => 'University of Malaya',
                'native_name' => 'Universiti Malaya',
                'xchange' => 300,
                'web' => 'https://www.um.edu.my'
            ],
            [
                'name' => 'University of Algarve',
                'original_name' => 'UNIVERSIDADE DO ALGARVE',
                'native_name' => 'Universidade do Algarve',
                'xchange' => 162,
                'web' => 'https://www.ualg.pt/en'
            ],
            [
                'name' => 'Tallinn University of Technology',
                'original_name' => 'TALLINNA TEHNIKAÜLIKOOL',
                'native_name' => 'Tallinna Tehnikaülikool',
                'xchange' => 131,
                'web' => 'https://www.taltech.ee/en/'
            ],
            [
                'name' => 'LAB University of Applied Sciences',
                'original_name' => 'Saimaan Ammattikorkeakoulu',
                'native_name' => 'LAB-ammattikorkeakoulu',
                'xchange' => 116,
                'web' => 'https://www.lab.fi/en'
            ],
            [
                'name' => 'Galway-Mayo Institute of Technology',
                'original_name' => 'GALWAY MAYO INSTITUTE OF TECHNOLOGY',
                'native_name' => 'Institúid Teicneolaíochta na Gaillimhe-Maigh Eo',
                'xchange' => 47,
                'web' => 'https://www.gmit.ie'
            ],
            [
                'name' => 'Shih Hsin University',
                'original_name' => 'Shih Hsin University',
                'native_name' => 'Shih Hsin University',
                'xchange' => 268,
                'web' => 'http://english.web.shu.edu.tw'
            ],
            [
                'name' => '',
                'original_name' => '',
                'native_name' => '',
                'xchange' => ,
                'web' => ''
            ],
            [
                'name' => '',
                'original_name' => '',
                'native_name' => '',
                'xchange' => ,
                'web' => ''
            ]
        ]);
    }
}
