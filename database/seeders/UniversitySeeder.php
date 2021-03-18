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
        University::createProfile(
            'Dania Academy',
            'Dania Academy, University of Higher Education/University of Applied Sciences',
            'Erhvervsakademi Dania',
            28,
            'https://eadania.com',
            City::add('Randers', 'DK')
        );
        University::createProfile(
            'IDRAC Business School',
            'IDRAC - International School of Management',
            'Institut pour le Développement et la Recherche d\'Action Commerciale',
            59,
            'https://www.idrac-business-school.com',
            City::add('Lyon', 'FR')
        );
        University::createProfile(
            'Design School Kolding',
            'DESIGNSKOLEN KOLDING',
            'Designskolen Kolding',
            86,
            'https://www.designskolenkolding.dk/en',
            City::add('Kolding', 'DK')
        );
        University::createProfile(
            'Academy of Fine Arts In Łódź',
            'Academy of Fine Arts in Lodz (ASP)',
            'Akademia Sztuk Pięknych im. Władysława Strzemińskiego',
            128,
            'https://www.asp.lodz.pl/index.php/pl/',
            City::add('Łódź', 'PL')
        );
        University::createProfile(
            'University of Applied Sciences Technikum Wien',
            'TECHNIKUM WIEN',
            'Fachhochschule Technikum Wien',
            163,
            'https://www.technikum-wien.at/en/',
            City::add('Wien', 'AT')
        );
        University::createProfile(
            'Tampere University of Applied Sciences',
            'PIRKANMAAN AMMATTIKORKEAKOULU',
            'Tampereen ammattikorkeakoulu',
            132,
            'https://www.tuni.fi/en',
            City::add('Tampere', 'FI')
        );
        University::createProfile(
            'University of Klagenfurt',
            'UNIVERSITÄT KLAGENFURT',
            'Universität Klagenfurt',
            12,
            'https://www.aau.at/en/',
            City::add('Klagenfurt', 'AT')
        );
        University::createProfile(
            'Tallinn University',
            'TALLINNA ÜLIKOOL',
            'Tallinna Ülikool',
            130,
            'https://www.tlu.ee/en',
            City::add('Tallinn', 'EE')
        );
        University::createProfile(
            'Vilnius Art Academy',
            'VILNIAUS DAILES AKADEMIJA',
            'Vilniaus dailės akademija',
            272,
            'https://www.vda.lt/en/',
            City::add('Vilnius', 'LT')
        );
        University::createProfile(
            'University of Maribor',
            'UNIVERZA V MARIBORU',
            'Univerza v Mariboru',
            187,
            'https://www.um.si/en/Pages/default.aspx',
            City::add('Maribor', 'SI')
        );
        University::createProfile(
            'Vilnius Gediminas Technical University',
            'VILNIAUS GEDIMINO TECHNIKOS UNIVERSITETAS (VGTU)',
            'Vilniaus Gedimino technikos universitetas',
            220,
            'https://vilniustech.lt/index.php?lang=2',
            City::add('Vilnius', 'LT')
        );
        University::createProfile(
            'European University Cyprus',
            'European University Cyprus',
            'European University Cyprus',
            40,
            'https://euc.ac.cy/en/',
            City::add('Nicosia', 'CY')
        );
        University::createProfile(
            'University of Vaasa',
            'VAASAN YLIOPISTO',
            'Vaasan yliopisto',
            208,
            'https://www.univaasa.fi/en',
            City::add('Vaasa', 'FI')
        );
        University::createProfile(
            'Polytechnical Institute of Beja',
            'INSTITUTO POLITÉCNICO DE BEJA',
            'Instituto Politécnico de Beja',
            64,
            'https://www.ipbeja.pt/en/Pages/default.aspx',
            City::add('Beja', 'PT')
        );
        University::createProfile(
            'Volda University College',
            'HOGSKULEN I VOLDA',
            'Høgskulen i Volda',
            221,
            'https://www.hivolda.no/en',
            City::add('Volda', 'NO')
        );
        University::createProfile(
            'Technical University of Madrid',
            'UNIVERSIDAD POLITÉCNICA DE MADRID',
            'Universidad Politécnica de Madrid',
            287,
            'https://www.upm.es/internacional',
            City::add('Madrid', 'ES')
        );
        University::createProfile(
            'University of Lille',
            'UNIVERSITE CHARLES DE GAULLE - LILLE III',
            'Université de Lille',
            158,
            'https://www.univ-lille.fr/home/',
            City::add('Lille', 'FR')
        );
        University::createProfile(
            'Pontifical University of Salamanca',
            'UNIVERSIDAD PONTIFICIA DE SALAMANCA',
            'Universidad Pontificia de Salamanca',
            149,
            'https://www.upsa.es',
            City::add('Salamanca', 'ES')
        );
        University::createProfile(
            'Catholic University of Portugal',
            'UNIVERSIDADE CATÓLICA PORTUGUESA',
            'Universidade Católica Portuguesa',
            23,
            'https://www.ucp.pt/?set_language=en',
            City::add('Lisbon', 'PT')
        );
        University::createProfile(
            'Letterkenny Institute of Technology',
            'LETTERKENNY INSTITUTE OF TECHNOLOGY',
            'Institiúid Teicneolaíochta Leitir Ceanainn',
            89,
            'https://www.lyit.ie/Home',
            City::add('Letterkenny', 'IE')
        );
        University::createProfile(
            'Ionian University',
            'IONIO PANEPISTIMIO',
            'Ionio Panepistimio',
            69,
            'https://ionio.gr/en/',
            City::add('Corfu', 'GR')
        );
        University::createProfile(
            'BINUS University',
            'Binus University, Jl. Kebon Jeruk Raya No. 27',
            'Universitas Bina Nusantara',
            258,
            'https://binus.ac.id',
            City::add('Jakarta', 'ID')
        );
        University::createProfile(
            'Nottingham Trent University',
            'THE NOTTINGHAM TRENT UNIVERSITY',
            'Nottingham Trent University',
            102,
            'https://www.ntu.ac.uk',
            City::add('Nottingham', 'GB')
        );
        University::createProfile(
            'Frankfurt University of Applied Sciences',
            'FACHHOCHSCHULE FRANKFURT AM MAIN - UNIVERSITY OF APPLIED SCIENCES',
            'Frankfurt University of Applied Sciences',
            165,
            'https://www.frankfurt-university.de/en/',
            City::add('Frankfurt am Main', 'DE')
        );
        University::createProfile(
            'University of Zagreb',
            'University of Zagreb',
            'Sveučilište u Zagrebu',
            211,
            'http://www.unizg.hr/homepage/',
            City::add('Zagreb', 'HR')
        );
        University::createProfile(
            'University Colleges Leuven-Limburg',
            'KATHOLIEKE HOGESCHOOL LIMBURG',
            'University Colleges Leuven-Limburg',
            92,
            'https://www.ucll.be/international',
            City::add('Diepenbeek', 'BE')
        );
        University::createProfile(
            'Alexander Dubcek University in Trenčín',
            'TRENCIANSKA UNIVERZITA ALEXANDRA DUBCEKA V TRENCINE',
            'Trenčianska univerzita Alexandra Dubčeka v Trenčíne',
            10,
            'https://tnuni.sk/',
            City::add('Trenčín', 'SK')
        );
        University::createProfile(
            'Athens University of Economics and Business',
            'IKONOMIKO PANEPISTIMIO ATHINON',
            'Oikonomiko Panepistimio Athinon',
            15,
            'https://www.aueb.gr/en',
            City::add('Athens', 'GR')
        );
        University::createProfile(
            'Deggendorf Institute of Technology',
            'Deggendorf Institute of Technlogy',
            'Deggendorf Institute of Technology',
            284,
            'https://www.th-deg.de/en',
            City::add('Deggendorf', 'DE')
        );
    }
}
