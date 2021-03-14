<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\University;
use App\Models\City;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        University::createProfile(
            'University of Duisburg-Essen',
            'UNIVERSITÄT DUISBURG-ESSEN',
            'Universität Duisburg-Essen',
            178,
            'https://www.uni-due.de/en',
            City::add('Duisburg', 'DE')
        );
        University::createProfile(
            'Boğaziçi University',
            'Bogaziçi Üniversitesi',
            'Boğaziçi Üniversitesi',
            334,
            'http://www.boun.edu.tr/en_US',
            City::add('Istanbul', 'TR')
            
        );
        University::createProfile(
            'Polytechnic Institute of Porto',
            'INSTITUTO POLITÉCNICO DO PORTO',
            'Instituto Politécnico do Porto',
            67,
            'https://www.ipp.pt/?set_language=en',
            City::add('Porto', 'PT')
        );
        University::createProfile(
            'Bezalel Academy of Arts and Design',
            'BEZALEL ACADEMY OF ART AND DESIGN - JERUSALEM',
            'Bezalel Academy of Arts and Design',
            254,
            'http://www.bezalel.ac.il/en/',
            City::add('Jerusalem', 'IL')

        );
        University::createProfile(
            'University of Malaya',
            'University of Malaya',
            'Universiti Malaya',
            300,
            'https://www.um.edu.my',
            City::add('Kuala Lumpur', 'MY')
        );
        University::createProfile(
            'University of Algarve',
            'UNIVERSIDADE DO ALGARVE',
            'Universidade do Algarve',
            162,
            'https://www.ualg.pt/en',
            City::add('Faro', 'PT')

        );
        University::createProfile(
            'Tallinn University of Technology',
            'TALLINNA TEHNIKAÜLIKOOL',
            'Tallinna Tehnikaülikool',
            131,
            'https://www.taltech.ee/en/',
            City::add('Tallinn', 'EE')
        );
        University::createProfile(
            'LAB University of Applied Sciences',
            'Saimaan Ammattikorkeakoulu',
            'LAB-ammattikorkeakoulu',
            116,
            'https://www.lab.fi/en',
            City::add('Lahti', 'FI')
        );
        University::createProfile(
            'Galway-Mayo Institute of Technology',
            'GALWAY MAYO INSTITUTE OF TECHNOLOGY',
            'Institúid Teicneolaíochta na Gaillimhe-Maigh Eo',
            47,
            'https://www.gmit.ie',
            City::add('Galway', 'IE')
        );
        University::createProfile(
            'Shih Hsin University',
            'Shih Hsin University',
            'Shih Hsin University',
            268,
            'http://english.web.shu.edu.tw',
            City::add('Taipei', 'TW')
        );
        University::createProfile(
            'Polytechnic Institute of Viana do Castelo',
            'INSTITUTO POLITÉCNICO DE VIANA DO CASTELO',
            'Instituto Politécnico de Viana do Castelo',
            66,
            'http://internacional.ipvc.pt/en/node/20',
            City::add('Viana do Castelo', 'PT')
        );
        University::createProfile(
            'University of Porto',
            'UNIVERSIDADE DO PORTO',
            'Universidade do Porto',
            150,
            'https://sigarra.up.pt/up/en/WEB_BASE.GERA_PAGINA?p_pagina=home',
            City::add('Porto', 'PT')
        );
        University::createProfile(
            'Estonian Academy of Arts',
            'EESTI KUNSTIAKADEEMIA',
            'Eesti Kunstiakadeemia',
            39,
            'https://www.artun.ee/en/home/',
            City::add('Tallinn', 'EE')
        );
        University::createProfile(
            'University of Vigo',
            'UNIVERSIDAD DE VIGO',
            'Universidade de Vigo',
            144,
            'https://www.uvigo.gal/en',
            City::add('Vigo', 'ES')
        );
        University::createProfile(
            'Academy of Fine Arts in Katowice',
            'AKADEMIA SZTUK PIEKNYCH W KATOWICACH (ASP)',
            'Akademia Sztuk Pięknych w Katowicach',
            137,
            'https://asp.katowice.pl/en',
            City::add('Katowice', 'PL')
        );
        University::createProfile(
            'Erasmus Brussels University of Applied Sciences and Arts',
            'ERASMUSHOGESCHOOL BRUSSEL',
            'Erasmushogeschool Brussel',
            37,
            'https://www.erasmushogeschool.be/en',
            City::add('Brussels', 'BE')

        );
        University::createProfile(
            'University of Aveiro',
            'UNIVERSIDADE DE AVEIRO',
            'Universidade de Aveiro',
            171,
            'https://www.ua.pt',
            City::add('Aveiro', 'PT')
        );
        University::createProfile(
            'Art Academy of Latvia',
            'LATVIJAS MAKSLAS AKADEMIJA',
            'Latvijas Mākslas akadēmija',
            14,
            'https://www.lma.lv/en',
            City::add('Riga', 'LV')
        );
        University::createProfile(
            'NHL Stenden University of Applied Sciences',
            'NHL Stenden University of Applied Sciences',
            'NHL Stenden Hogeschool',
            101,
            'https://www.nhlstenden.com/en',
            City::add('Leeuwarden', 'NL')
        );
        University::createProfile(
            'University of Castilla–La Mancha',
            'UNIVERSIDAD DE CASTILLA-LA MANCHA',
            'Universidad de Castilla-La Mancha',
            145,
            'https://www.uclm.es/?sc_lang=en',
            City::add('Ciudad Real', 'ES')
        );
        University::createProfile(
            'Karadeniz Technical University',
            'Karadeniz Teknik Universitesi',
            'Karadeniz Teknik Üniversitesi',
            80,
            'https://www.ktu.edu.tr/en',
            City::add('Trabzon', 'TR')
        );
        University::createProfile(
            'Chemnitz University of Technology',
            'TECHNISCHE UNIVERSITÄT CHEMNITZ',
            'Technische Universität Chemnitz',
            58,
            'https://www.tu-chemnitz.de/index.html.en',
            City::add('Chemnitz', 'DE')
        );
        University::createProfile(
            'Institute of Technology Carlow',
            'INSTITUTE OF TECHNOLOGY CARLOW',
            'Institiúid Teicneolaíochta Cheatharlach',
            397,
            'https://www.itcarlow.ie',
            City::add('Carlow', 'IE')
        );
        University::createProfile(
            'Institute of Technology Tralee',
            'INSTITUTE OF TECHNOLOGY TRALEE',
            'Institiúid Teicneolaíochta Thrá Lí',
            62,
            'https://www.ittralee.ie/en/',
            City::add('Tralee', 'IE')
        );
        University::createProfile(
            'Dortmund University of Applied Sciences and Arts',
            'FACHHOCHSCHULE DORTMUND',
            'Fachhochschule Dortmund',
            41,
            'https://www.fh-dortmund.de/en/index.php',
            City::add('Dortmund', 'DE')
        );
        University::createProfile(
            'The Academy of Fine Arts and Design',
            'VYSOKA SKOLA VYTVARNYCH UMENI V BRATISLAVE',
            'Vysoká škola výtvarných umení v Bratislave',
            224,
            'https://www.vsvu.sk/en/',
            City::add('Bratislava', 'SK')
        );
        University::createProfile(
            'Polytechnic University of Milan',
            'POLITECNICO DI MILANO',
            'Politecnico di Milano',
            111,
            'https://www.polimi.it/en/',
            City::add('Milan', 'IT')
        );
        University::createProfile(
            'St. Pölten University of Applied Sciences',
            'St. Pölten University of Applied Sciences',
            'Fachhochschule St. Pölten',
            126,
            'https://www.fhstp.ac.at/en?set_language=en',
            City::add('Sankt Pölten', 'AT')
        );
        University::createProfile(
            'West Pomeranian University of Technology',
            'West Pomeranian University of Technology',
            'Zachodniopomorski Uniwersytet Technologiczny w Szczecinie',
            230,
            'https://www.zut.edu.pl/EN/university.html',
            City::add('Szczecin', 'PL')
        );
        University::createProfile(
            'University of Ljubljana',
            'UNIVERZA V LJUBLJANI',
            'Univerza v Ljubljani',
            7,
            'https://www.uni-lj.si/eng/',
            City::add('Ljubljana', 'Slovenia')
        );
    }
}
