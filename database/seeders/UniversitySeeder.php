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
        University::createProfile([
            'nameEN' => 'University of Duisburg-Essen',
            'nameDB' => 'UNIVERSITÄT DUISBURG-ESSEN',
            'nameORG' => 'Universität Duisburg-Essen',
            'xchangeID' => 178,
            'xchangeLink' => 'https://xchange.utb.cz/instituce/178-universitat-duisburg-essen',
            'web' => 'https://www.uni-due.de/en',
            'city' => City::add('Duisburg', 'DE')
        ]);
        University::createProfile([
            'nameEN' => 'Boğaziçi University',
            'nameDB' => 'Bogaziçi Üniversitesi',
            'nameORG' => 'Boğaziçi Üniversitesi',
            'xchangeID' => 334,
            'xchangeLink' => '',
            'web' => 'http://www.boun.edu.tr/en_US',
            'city' => City::add('Istanbul', 'TR')
        ]);
        University::createProfile([
            'nameEN' => 'Polytechnic Institute of Porto',
            'nameDB' => 'INSTITUTO POLITÉCNICO DO PORTO',
            'nameORG' => 'Instituto Politécnico do Porto',
            'xchangeID' => 67,
            'xchangeLink' => '',
            'web' => 'https://www.ipp.pt/?set_language=en',
            'city' => City::add('Porto', 'PT')
        ]);
        University::createProfile([
            'nameEN' => 'Bezalel Academy of Arts and Design',
            'nameDB' => 'BEZALEL ACADEMY OF ART AND DESIGN - JERUSALEM',
            'nameORG' => 'Bezalel Academy of Arts and Design',
            'xchangeID' => 254,
            'xchangeLink' => '',
            'web' => 'http://www.bezalel.ac.il/en/',
            'city' => City::add('Jerusalem', 'IL')
        ]);
        University::createProfile([
            'nameEN' => 'University of Malaya',
            'nameDB' => 'University of Malaya',
            'nameORG' => 'Universiti Malaya',
            'xchangeID' => 300,
            'xchangeLink' => '',
            'web' => 'https://www.um.edu.my',
            'city' => City::add('Kuala Lumpur', 'MY')
        ]);
        University::createProfile([
            'nameEN' => 'University of Algarve',
            'nameDB' => 'UNIVERSIDADE DO ALGARVE',
            'nameORG' => 'Universidade do Algarve',
            'xchangeID' => 162,
            'xchangeLink' => '',
            'web' => 'https://www.ualg.pt/en',
            'city' => City::add('Faro', 'PT')
        ]);
        University::createProfile([
            'nameEN' => 'Tallinn University of Technology',
            'nameDB' => 'TALLINNA TEHNIKAÜLIKOOL',
            'nameORG' => 'Tallinna Tehnikaülikool',
            'xchangeID' => 131,
            'xchangeLink' => '',
            'web' => 'https://www.taltech.ee/en/',
            'city' => City::add('Tallinn', 'EE')
        ]);
        University::createProfile([
            'nameEN' => 'LAB University of Applied Sciences',
            'nameDB' => 'Saimaan Ammattikorkeakoulu',
            'nameORG' => 'LAB-ammattikorkeakoulu',
            'xchangeID' => 116,
            'xchangeLink' => '',
            'web' => 'https://www.lab.fi/en',
            'city' => City::add('Lahti', 'FI')
        ]);
        University::createProfile([
            'nameEN' => 'Galway-Mayo Institute of Technology',
            'nameDB' => 'GALWAY MAYO INSTITUTE OF TECHNOLOGY',
            'nameORG' => 'Institúid Teicneolaíochta na Gaillimhe-Maigh Eo',
            'xchangeID' => 47,
            'xchangeLink' => '',
            'web' => 'https://www.gmit.ie',
            'city' => City::add('Galway', 'IE')
        ]);
        University::createProfile([
            'nameEN' => 'Shih Hsin University',
            'nameDB' => 'Shih Hsin University',
            'nameORG' => 'Shih Hsin University',
            'xchangeID' => 268,
            'xchangeLink' => '',
            'web' => 'http://english.web.shu.edu.tw',
            'city' => City::add('Taipei', 'TW')
        ]);
        University::createProfile([
            'nameEN' => 'Polytechnic Institute of Viana do Castelo',
            'nameDB' => 'INSTITUTO POLITÉCNICO DE VIANA DO CASTELO',
            'nameORG' => 'Instituto Politécnico de Viana do Castelo',
            'xchangeID' => 66,
            'xchangeLink' => '',
            'web' => 'http://internacional.ipvc.pt/en/node/20',
            'city' => City::add('Viana do Castelo', 'PT')
        ]);
        University::createProfile([
            'nameEN' => 'University of Porto',
            'nameDB' => 'UNIVERSIDADE DO PORTO',
            'nameORG' => 'Universidade do Porto',
            'xchangeID' => 150,
            'xchangeLink' => '',
            'web' => 'https://sigarra.up.pt/up/en/WEB_BASE.GERA_PAGINA?p_pagina=home',
            'city' => City::add('Porto', 'PT')
        ]);
        University::createProfile([
            'nameEN' => 'Estonian Academy of Arts',
            'nameDB' => 'EESTI KUNSTIAKADEEMIA',
            'nameORG' => 'Eesti Kunstiakadeemia',
            'xchangeID' => 39,
            'xchangeLink' => '',
            'web' => 'https://www.artun.ee/en/home/',
            'city' => City::add('Tallinn', 'EE')
        ]);
        University::createProfile([
            'nameEN' => 'University of Vigo',
            'nameDB' => 'UNIVERSIDAD DE VIGO',
            'nameORG' => 'Universidade de Vigo',
            'xchangeID' => 144,
            'xchangeLink' => '',
            'web' => 'https://www.uvigo.gal/en',
            'city' => City::add('Vigo', 'ES')
        ]);
        University::createProfile([
            'nameEN' => 'Academy of Fine Arts in Katowice',
            'nameDB' => 'AKADEMIA SZTUK PIEKNYCH W KATOWICACH (ASP)',
            'nameORG' => 'Akademia Sztuk Pięknych w Katowicach',
            'xchangeID' => 137,
            'xchangeLink' => '',
            'web' => 'https://asp.katowice.pl/en',
            'city' => City::add('Katowice', 'PL')
        ]);
        University::createProfile([
            'nameEN' => 'Erasmus Brussels University of Applied Sciences and Arts',
            'nameDB' => 'ERASMUSHOGESCHOOL BRUSSEL',
            'nameORG' => 'Erasmushogeschool Brussel',
            'xchangeID' => 37,
            'xchangeLink' => '',
            'web' => 'https://www.erasmushogeschool.be/en',
            'city' => City::add('Brussels', 'BE')
        ]);
        University::createProfile([
            'nameEN' => 'University of Aveiro',
            'nameDB' => 'UNIVERSIDADE DE AVEIRO',
            'nameORG' => 'Universidade de Aveiro',
            'xchangeID' => 171,
            'xchangeLink' => '',
            'web' => 'https://www.ua.pt',
            'city' => City::add('Aveiro', 'PT')
        ]);
        University::createProfile([
            'nameEN' => 'Art Academy of Latvia',
            'nameDB' => 'LATVIJAS MAKSLAS AKADEMIJA',
            'nameORG' => 'Latvijas Mākslas akadēmija',
            'xchangeID' => 14,
            'xchangeLink' => '',
            'web' => 'https://www.lma.lv/en',
            'city' => City::add('Riga', 'LV')
        ]);
        University::createProfile([
            'nameEN' => 'NHL Stenden University of Applied Sciences',
            'nameDB' => 'NHL Stenden University of Applied Sciences',
            'nameORG' => 'NHL Stenden Hogeschool',
            'xchangeID' => 101,
            'xchangeLink' => '',
            'web' => 'https://www.nhlstenden.com/en',
            'city' => City::add('Leeuwarden', 'NL')
        ]);
        University::createProfile([
            'nameEN' => 'University of Castilla–La Mancha',
            'nameDB' => 'UNIVERSIDAD DE CASTILLA-LA MANCHA',
            'nameORG' => 'Universidad de Castilla-La Mancha',
            'xchangeID' => 145,
            'xchangeLink' => '',
            'web' => 'https://www.uclm.es/?sc_lang=en',
            'city' => City::add('Ciudad Real', 'ES')
        ]);
        University::createProfile([
            'nameEN' => 'Karadeniz Technical University',
            'nameDB' => 'Karadeniz Teknik Universitesi',
            'nameORG' => 'Karadeniz Teknik Üniversitesi',
            'xchangeID' => 80,
            'xchangeLink' => '',
            'web' => 'https://www.ktu.edu.tr/en',
            'city' => City::add('Trabzon', 'TR')
        ]);
        University::createProfile([
            'nameEN' => 'Chemnitz University of Technology',
            'nameDB' => 'TECHNISCHE UNIVERSITÄT CHEMNITZ',
            'nameORG' => 'Technische Universität Chemnitz',
            'xchangeID' => 58,
            'xchangeLink' => '',
            'web' => 'https://www.tu-chemnitz.de/index.html.en',
            'city' => City::add('Chemnitz', 'DE')
        ]);
        University::createProfile([
            'nameEN' => 'Institute of Technology Carlow',
            'nameDB' => 'INSTITUTE OF TECHNOLOGY CARLOW',
            'nameORG' => 'Institiúid Teicneolaíochta Cheatharlach',
            'xchangeID' => 397,
            'xchangeLink' => '',
            'web' => 'https://www.itcarlow.ie',
            'city' => City::add('Carlow', 'IE')
        ]);
        University::createProfile([
            'nameEN' => 'Institute of Technology Tralee',
            'nameDB' => 'INSTITUTE OF TECHNOLOGY TRALEE',
            'nameORG' => 'Institiúid Teicneolaíochta Thrá Lí',
            'xchangeID' => 62,
            'xchangeLink' => '',
            'web' => 'https://www.ittralee.ie/en/',
            'city' => City::add('Tralee', 'IE')
        ]);
        University::createProfile([
            'nameEN' => 'Dortmund University of Applied Sciences and Arts',
            'nameDB' => 'FACHHOCHSCHULE DORTMUND',
            'nameORG' => 'Fachhochschule Dortmund',
            'xchangeID' => 41,
            'xchangeLink' => '',
            'web' => 'https://www.fh-dortmund.de/en/index.php',
            'city' => City::add('Dortmund', 'DE')
        ]);
        University::createProfile([
            'nameEN' => 'The Academy of Fine Arts and Design',
            'nameDB' => 'VYSOKA SKOLA VYTVARNYCH UMENI V BRATISLAVE',
            'nameORG' => 'Vysoká škola výtvarných umení v Bratislave',
            'xchangeID' => 224,
            'xchangeLink' => '',
            'web' => 'https://www.vsvu.sk/en/',
            'city' => City::add('Bratislava', 'SK')
        ]);
        University::createProfile([
            'nameEN' => 'Polytechnic University of Milan',
            'nameDB' => 'POLITECNICO DI MILANO',
            'nameORG' => 'Politecnico di Milano',
            'xchangeID' => 111,
            'xchangeLink' => '',
            'web' => 'https://www.polimi.it/en/',
            'city' => City::add('Milan', 'IT')
        ]);
        University::createProfile([
            'nameEN' => 'St. Pölten University of Applied Sciences',
            'nameDB' => 'St. Pölten University of Applied Sciences',
            'nameORG' => 'Fachhochschule St. Pölten',
            'xchangeID' => 126,
            'xchangeLink' => '',
            'web' => 'https://www.fhstp.ac.at/en?set_language=en',
            'city' => City::add('Sankt Pölten', 'AT')
        ]);
        University::createProfile([
            'nameEN' => 'West Pomeranian University of Technology',
            'nameDB' => 'West Pomeranian University of Technology',
            'nameORG' => 'Zachodniopomorski Uniwersytet Technologiczny w Szczecinie',
            'xchangeID' => 230,
            'xchangeLink' => '',
            'web' => 'https://www.zut.edu.pl/EN/university.html',
            'city' => City::add('Szczecin', 'PL')
        ]);
        University::createProfile([
            'nameEN' => 'University of Ljubljana',
            'nameDB' => 'UNIVERZA V LJUBLJANI',
            'nameORG' => 'Univerza v Ljubljani',
            'xchangeID' => 7,
            'xchangeLink' => '',
            'web' => 'https://www.uni-lj.si/eng/',
            'city' => City::add('Ljubljana', 'SI')
        ]);
        University::createProfile([
            'nameEN' => 'Dania Academy',
            'nameDB' => 'Dania Academy, University of Higher Education/University of Applied Sciences',
            'nameORG' => 'Erhvervsakademi Dania',
            'xchangeID' => 28,
            'xchangeLink' => '',
            'web' => 'https://eadania.com',
            'city' => City::add('Randers', 'DK')
        ]);
        University::createProfile([
            'nameEN' => 'IDRAC Business School',
            'nameDB' => 'IDRAC - International School of Management',
            'nameORG' => 'Institut pour le Développement et la Recherche d\'Action Commerciale',
            'xchangeID' => 59,
            'xchangeLink' => '',
            'web' => 'https://www.idrac-business-school.com',
            'city' => City::add('Lyon', 'FR')
        ]);
        University::createProfile([
            'nameEN' => 'Design School Kolding',
            'nameDB' => 'DESIGNSKOLEN KOLDING',
            'nameORG' => 'Designskolen Kolding',
            'xchangeID' => 86,
            'xchangeLink' => '',
            'web' => 'https://www.designskolenkolding.dk/en',
            'city' => City::add('Kolding', 'DK')
        ]);
        University::createProfile([
            'nameEN' => 'Academy of Fine Arts In Łódź',
            'nameDB' => 'Academy of Fine Arts in Lodz (ASP)',
            'nameORG' => 'Akademia Sztuk Pięknych im. Władysława Strzemińskiego',
            'xchangeID' => 128,
            'xchangeLink' => '',
            'web' => 'https://www.asp.lodz.pl/index.php/pl/',
            'city' => City::add('Łódź', 'PL')
        ]);
        University::createProfile([
            'nameEN' => 'University of Applied Sciences Technikum Wien',
            'nameDB' => 'TECHNIKUM WIEN',
            'nameORG' => 'Fachhochschule Technikum Wien',
            'xchangeID' => 163,
            'xchangeLink' => '',
            'web' => 'https://www.technikum-wien.at/en/',
            'city' => City::add('Wien', 'AT')
        ]);
        University::createProfile([
            'nameEN' => 'Tampere University of Applied Sciences',
            'nameDB' => 'PIRKANMAAN AMMATTIKORKEAKOULU',
            'nameORG' => 'Tampereen ammattikorkeakoulu',
            'xchangeID' => 132,
            'xchangeLink' => '',
            'web' => 'https://www.tuni.fi/en',
            'city' => City::add('Tampere', 'FI')
        ]);
        University::createProfile([
            'nameEN' => 'University of Klagenfurt',
            'nameDB' => 'UNIVERSITÄT KLAGENFURT',
            'nameORG' => 'Universität Klagenfurt',
            'xchangeID' => 12,
            'xchangeLink' => '',
            'web' => 'https://www.aau.at/en/',
            'city' => City::add('Klagenfurt', 'AT')
        ]);
        University::createProfile([
            'nameEN' => 'Tallinn University',
            'nameDB' => 'TALLINNA ÜLIKOOL',
            'nameORG' => 'Tallinna Ülikool',
            'xchangeID' => 130,
            'xchangeLink' => '',
            'web' => 'https://www.tlu.ee/en',
            'city' => City::add('Tallinn', 'EE')
        ]);
        University::createProfile([
            'nameEN' => 'Vilnius Art Academy',
            'nameDB' => 'VILNIAUS DAILES AKADEMIJA',
            'nameORG' => 'Vilniaus dailės akademija',
            'xchangeID' => 272,
            'xchangeLink' => '',
            'web' => 'https://www.vda.lt/en/',
            'city' => City::add('Vilnius', 'LT')
        ]);
        University::createProfile([
            'nameEN' => 'University of Maribor',
            'nameDB' => 'UNIVERZA V MARIBORU',
            'nameORG' => 'Univerza v Mariboru',
            'xchangeID' => 187,
            'xchangeLink' => '',
            'web' => 'https://www.um.si/en/Pages/default.aspx',
            'city' => City::add('Maribor', 'SI')
        ]);
        University::createProfile([
            'nameEN' => 'Vilnius Gediminas Technical University',
            'nameDB' => 'VILNIAUS GEDIMINO TECHNIKOS UNIVERSITETAS (VGTU)',
            'nameORG' => 'Vilniaus Gedimino technikos universitetas',
            'xchangeID' => 220,
            'xchangeLink' => '',
            'web' => 'https://vilniustech.lt/index.php?lang=2',
            'city' => City::add('Vilnius', 'LT')
        ]);
        University::createProfile([
            'nameEN' => 'European University Cyprus',
            'nameDB' => 'European University Cyprus',
            'nameORG' => 'European University Cyprus',
            'xchangeID' => 40,
            'xchangeLink' => '',
            'web' => 'https://euc.ac.cy/en/',
            'city' => City::add('Nicosia', 'CY')
        ]);
        University::createProfile([
            'nameEN' => 'University of Vaasa',
            'nameDB' => 'VAASAN YLIOPISTO',
            'nameORG' => 'Vaasan yliopisto',
            'xchangeID' => 208,
            'xchangeLink' => '',
            'web' => 'https://www.univaasa.fi/en',
            'city' => City::add('Vaasa', 'FI')
        ]);
        University::createProfile([
            'nameEN' => 'Polytechnical Institute of Beja',
            'nameDB' => 'INSTITUTO POLITÉCNICO DE BEJA',
            'nameORG' => 'Instituto Politécnico de Beja',
            'xchangeID' => 64,
            'xchangeLink' => '',
            'web' => 'https://www.ipbeja.pt/en/Pages/default.aspx',
            'city' => City::add('Beja', 'PT')
        ]);
        University::createProfile([
            'nameEN' => 'Volda University College',
            'nameDB' => 'HOGSKULEN I VOLDA',
            'nameORG' => 'Høgskulen i Volda',
            'xchangeID' => 221,
            'xchangeLink' => '',
            'web' => 'https://www.hivolda.no/en',
            'city' => City::add('Volda', 'NO')
        ]);
        University::createProfile([
            'nameEN' => 'Technical University of Madrid',
            'nameDB' => 'UNIVERSIDAD POLITÉCNICA DE MADRID',
            'nameORG' => 'Universidad Politécnica de Madrid',
            'xchangeID' => 287,
            'xchangeLink' => '',
            'web' => 'https://www.upm.es/internacional',
            'city' => City::add('Madrid', 'ES')
        ]);
        University::createProfile([
            'nameEN' => 'University of Lille',
            'nameDB' => 'UNIVERSITE CHARLES DE GAULLE - LILLE III',
            'nameORG' => 'Université de Lille',
            'xchangeID' => 158,
            'xchangeLink' => '',
            'web' => 'https://www.univ-lille.fr/home/',
            'city' => City::add('Lille', 'FR')
        ]);
        University::createProfile([
            'nameEN' => 'Pontifical University of Salamanca',
            'nameDB' => 'UNIVERSIDAD PONTIFICIA DE SALAMANCA',
            'nameORG' => 'Universidad Pontificia de Salamanca',
            'xchangeID' => 149,
            'xchangeLink' => '',
            'web' => 'https://www.upsa.es',
            'city' => City::add('Salamanca', 'ES')
        ]);
        University::createProfile([
            'nameEN' => 'Catholic University of Portugal',
            'nameDB' => 'UNIVERSIDADE CATÓLICA PORTUGUESA',
            'nameORG' => 'Universidade Católica Portuguesa',
            'xchangeID' => 23,
            'xchangeLink' => '',
            'web' => 'https://www.ucp.pt/?set_language=en',
            'city' => City::add('Lisbon', 'PT')
        ]);
        University::createProfile([
            'nameEN' => 'Letterkenny Institute of Technology',
            'nameDB' => 'LETTERKENNY INSTITUTE OF TECHNOLOGY',
            'nameORG' => 'Institiúid Teicneolaíochta Leitir Ceanainn',
            'xchangeID' => 89,
            'xchangeLink' => '',
            'web' => 'https://www.lyit.ie/Home',
            'city' => City::add('Letterkenny', 'IE')
        ]);
        University::createProfile([
            'nameEN' => 'Ionian University',
            'nameDB' => 'IONIO PANEPISTIMIO',
            'nameORG' => 'Ionio Panepistimio',
            'xchangeID' => 69,
            'xchangeLink' => '',
            'web' => 'https://ionio.gr/en/',
            'city' => City::add('Corfu', 'GR')
        ]);
        University::createProfile([
            'nameEN' => 'BINUS University',
            'nameDB' => 'Binus University, Jl. Kebon Jeruk Raya No. 27',
            'nameORG' => 'Universitas Bina Nusantara',
            'xchangeID' => 258,
            'xchangeLink' => '',
            'web' => 'https://binus.ac.id',
            'city' => City::add('Jakarta', 'ID')
        ]);
        University::createProfile([
            'nameEN' => 'Nottingham Trent University',
            'nameDB' => 'THE NOTTINGHAM TRENT UNIVERSITY',
            'nameORG' => 'Nottingham Trent University',
            'xchangeID' => 102,
            'xchangeLink' => '',
            'web' => 'https://www.ntu.ac.uk',
            'city' => City::add('Nottingham', 'GB')
        ]);
        University::createProfile([
            'nameEN' => 'Frankfurt University of Applied Sciences',
            'nameDB' => 'FACHHOCHSCHULE FRANKFURT AM MAIN - UNIVERSITY OF APPLIED SCIENCES',
            'nameORG' => 'Frankfurt University of Applied Sciences',
            'xchangeID' => 165,
            'xchangeLink' => '',
            'web' => 'https://www.frankfurt-university.de/en/',
            'city' => City::add('Frankfurt am Main', 'DE')
        ]);
        University::createProfile([
            'nameEN' => 'University of Zagreb',
            'nameDB' => 'University of Zagreb',
            'nameORG' => 'Sveučilište u Zagrebu',
            'xchangeID' => 211,
            'xchangeLink' => '',
            'web' => 'http://www.unizg.hr/homepage/',
            'city' => City::add('Zagreb', 'HR')
        ]);
        University::createProfile([
            'nameEN' => 'University Colleges Leuven-Limburg',
            'nameDB' => 'KATHOLIEKE HOGESCHOOL LIMBURG',
            'nameORG' => 'University Colleges Leuven-Limburg',
            'xchangeID' => 92,
            'xchangeLink' => '',
            'web' => 'https://www.ucll.be/international',
            'city' => City::add('Diepenbeek', 'BE')
        ]);
        University::createProfile([
            'nameEN' => 'Alexander Dubcek University in Trenčín',
            'nameDB' => 'TRENCIANSKA UNIVERZITA ALEXANDRA DUBCEKA V TRENCINE',
            'nameORG' => 'Trenčianska univerzita Alexandra Dubčeka v Trenčíne',
            'xchangeID' => 10,
            'xchangeLink' => '',
            'web' => 'https://tnuni.sk/',
            'city' => City::add('Trenčín', 'SK')
        ]);
        University::createProfile([
            'nameEN' => 'Athens University of Economics and Business',
            'nameDB' => 'IKONOMIKO PANEPISTIMIO ATHINON',
            'nameORG' => 'Oikonomiko Panepistimio Athinon',
            'xchangeID' => 15,
            'xchangeLink' => '',
            'web' => 'https://www.aueb.gr/en',
            'city' => City::add('Athens', 'GR')
        ]);
        University::createProfile([
            'nameEN' => 'Deggendorf Institute of Technology',
            'nameDB' => 'Deggendorf Institute of Technlogy',
            'nameORG' => 'Deggendorf Institute of Technology',
            'xchangeID' => 284,
            'xchangeLink' => '',
            'web' => 'https://www.th-deg.de/en',
            'city' => City::add('Deggendorf', 'DE')
        ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'AKADEMIA SZTUK PIEKNYCH',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Saint Petersburg State University',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Stamford International University',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Dokuz Eylül Üniversitesi',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Zhejiang University',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Haute École des Arts du Rhin (HEAR)',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'UNIVERSIDAD REY JUAN CARLOS',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'LUCA - SCHOOL OF ARTS',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Mimar Sinan Guzel Sanatlar Universitesi',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'SHUMENSKI UNIVERSITET EPISKOP KONSTANTIN PRESLAVSKI',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Universidad ORT Uruguay',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'University College of Northern Denmark',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'KLAIPEDOS UNIVERSITETAS',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Técnico Lisboa',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'UNIWERSYTET LÓDZKI',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'INSTITUTO POLITÉCNICO DE BRAGANÇA',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'UNIVERSIDAD DEL PAÍS VASCO / EUSKAL HERRIKO UNIBERTSITATEA',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'CHALMERS TEKNISKA HÖGSKOLA',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Peter the Great St. Petersburg Polytechnic University',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Ecole Supérieure d\'Art et de Design d\'Orleans',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'KAPOSVÁRI EGYETEM',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'HANYANG UNIVERSITY',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Mapúa Institute of Technology',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Tallinna Tervishoiu Korgkool',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'ASSOCIATION INTERNATIONALE POUR LA FORMATION',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'UNIVERSITA DEGLI STUDI DI GENOVA',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Josip Juraj Strossmayer University of Osijek',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Soongsil University',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Limkokwing Universityof Creative Technology',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'National Taipei University of Technology',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Instituto Superior Miguel Torga',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'KATHOLIEKE UNIVERSITEIT LEUVEN',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'UNIVERSITE DES ANTILLES ET DE LA GUYANE',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'University of Dubrovnik',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'BUDAPESTI M?SZAKI ÉS GAZDASAGTUDOMANYI EGYETEM',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'UNIVERZIDADE FEEVALE',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Fachhochschule Nordwestschweiz, Hochschule für Gestaltung und Kunst',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'TECHNISCHE UNIVERSITÄT GRAZ',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'HOGSKOLEN I MOLDE',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Izmir University',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'ECOLE DE COMMERCE EUROPEENNE DE BORDEAUX',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'TAMPEREEN YLIOPISTO',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'UNIVERSITE DE LIEGE',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Universidade Lusófona Do Porto',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'VYSOKÁ SKOLA MÚZICKÝCH UMENÍ V BRATISLAVE',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'LAPIN YLIOPISTO',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'University of Thessaly',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'PXL University College',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'UNIVERSIDAD DE CÁDIZ',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'AKADEMIA SZTUK PIEKNYCH IM. JANA MATEJKI W KRAKOWIE',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'FACHHOCHSCHULE FULDA',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'HÖGSKOLAN DALARNA',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'LATVIJAS LAUKSAIMNIECÎBAS UNIVERSITÂTE',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'FUNDACION UNIVERSIDAD LOYOLA ANDALUCIA',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'State Academy of Fine Arts of Armenia',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'RUBIKA',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'UNIVERZA NA PRIMORSKEM',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'NEOMA Business School',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'SZÍNHÁZ- ÉS FILMM?VÉSZETI EGYETEM',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'UNIVERSITÄT PADERBORN',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'National University of Theatre and Film "I.L.Caragiale"',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'INSTITUTO POLITÉCNICO DE LEIRIA',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'HOCHSCHULE MITTWEIDA (FH)',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Universidade Vila Velha',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'FACHHOCHSCHULE VORARLBERG GMBH',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Anadolu Universitesi',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'UNIVERSITE DES SCIENCES SOCIALES TOULOUSE I',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Universitas Indonesia',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'University of Silesia',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'BAUHAUS-UNIVERSITÄT WEIMAR',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Udayana University',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'KIMEP University',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Riga Technical University',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'SIAULIAI UNIVERSITY',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'International Business Academy (IBA)',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'IMC FACHHOCHSCHULE KREMS GMBH',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'UNIVERSITÄT FÜR BODENKULTUR WIEN',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'UNIVERSITA DI BOLOGNA ALMA MATER STUDIORUM',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'UNIVERSITY OF NATIONAL AND WORLD ECONOMY',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Lomonosov Moscow State University',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => '"RISEBA" University of Business Arts and Technology',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'UNIVERSIDAD POLITÉCNICA DE VALENCIA ',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
    }
}
