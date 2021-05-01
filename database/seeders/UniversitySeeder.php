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
        University::createProfile([
            'nameEN' => 'Saint Petersburg State University',
            'nameDB' => 'Saint Petersburg State University',
            'nameORG' => 'Saint Petersburg State University',
            'xchangeID' => 262,
            'xchangeLink' => '262-saint-petersburg-state-university',
            'web' => 'https://english.spbu.ru/',
            'city' => City::add('Saint Petersburg', 'RU')
        ]);
        University::createProfile([
            'nameEN' => 'Stamford International University',
            'nameDB' => 'Stamford International University',
            'nameORG' => 'Stamford International University',
            'xchangeID' => 252,
            'xchangeLink' => '252-stamford-international-university',
            'web' => 'https://www.stamford.edu/',
            'city' => City::add('Bangkok', 'TH')
        ]);
        University::createProfile([
            'nameEN' => 'Dokuz Eylül Üniversitesi',
            'nameDB' => 'Dokuz Eylül Üniversitesi',
            'nameORG' => 'DOKUZ EYLUL UNIVERSITY',
            'xchangeID' => 29,
            'xchangeLink' => '29-dokuz-eylul-university',
            'web' => 'https://global.deu.edu.tr/',
            'city' => City::add('Izmir', 'TR')
        ]);
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
        University::createProfile([
            'nameEN' => 'UNIVERSIDAD REY JUAN CARLOS',
            'nameDB' => 'UNIVERSIDAD REY JUAN CARLOS',
            'nameORG' => 'UNIVERSIDAD REY JUAN CARLOS',
            'xchangeID' => 112,
            'xchangeLink' => '112-universidad-rey-juan-carlos',
            'web' => 'https://www.urjc.es/',
            'city' => City::add('Madrid', 'ES')
        ]);
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
        University::createProfile([
            'nameEN' => 'UNIVERSIDAD ORT URUGUAY',
            'nameDB' => 'Universidad ORT Uruguay',
            'nameORG' => 'UNIVERSIDAD ORT URUGUAY',
            'xchangeID' => 365,
            'xchangeLink' => '365-universidad-ort-uruguay',
            'web' => 'https://www.ort.edu.uy/',
            'city' => City::add('Montevideo', 'UY')
        ]);
        University::createProfile([
            'nameEN' => 'UNIVERSITY COLLEGE OF NORTHERN DENMARK',
            'nameDB' => 'University College of Northern Denmark',
            'nameORG' => 'UNIVERSITY COLLEGE OF NORTHERN DENMARK',
            'xchangeID' => 390,
            'xchangeLink' => '390-university-college-of-northern-denmark',
            'web' => 'https://www.ucn.dk/english',
            'city' => City::add('AALBORG ØST', 'DK')
        ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'KLAIPEDOS UNIVERSITETAS',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        University::createProfile([
            'nameEN' => 'Universidade Técnica de Lisboa',
            'nameDB' => 'Técnico Lisboa',
            'nameORG' => 'UNIVERSIDADE TÉCNICA DE LISBOA',
            'xchangeID' => 151,
            'xchangeLink' => '151-universidade-tecnica-de-lisboa',
            'web' => 'https://tecnico.ulisboa.pt/en/',
            'city' => City::add('Lisboa', 'PT')
        ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'UNIWERSYTET LÓDZKI',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        University::createProfile([
            'nameEN' => 'Polytechnic Institute of Bragança',
            'nameDB' => 'INSTITUTO POLITÉCNICO DE BRAGANÇA',
            'nameORG' => 'INSTITUTO POLITÉCNICO DE BRAGANÇA',
            'xchangeID' => 239,
            'xchangeLink' => '239-instituto-politecnico-de-braganca',
            'web' => 'http://portal3.ipb.pt/index.php/en/ipben/home',
            'city' => City::add('BRAGANÇ', 'PT')
        ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'UNIVERSIDAD DEL PAÍS VASCO / EUSKAL HERRIKO UNIBERTSITATEA',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        University::createProfile([
            'nameEN' => 'Chalmers University of Technology',
            'nameDB' => 'CHALMERS TEKNISKA HÖGSKOLA',
            'nameORG' => 'CHALMERS TEKNISKA HÖGSKOLA',
            'xchangeID' => 57,
            'xchangeLink' => '57-chalmers-tekniska-hogskola',
            'web' => 'https://www.chalmers.se/en/Pages/default.aspx',
            'city' => City::add('GÖTEBORG', 'SE')
        ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Peter the Great St. Petersburg Polytechnic University',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        University::createProfile([
            'nameEN' => 'College Art And Design D orléans',
            'nameDB' => 'Ecole Supérieure d\'Art et de Design d\'Orleans',
            'nameORG' => 'College Art And Design D orléans',
            'xchangeID' => 38,
            'xchangeLink' => '38-ecole-superieure-d-art-et-de-design-d-orleans',
            'web' => 'https://esadorleans.fr/en/home/',
            'city' => City::add('Orléans', 'FR')
        ]);
        University::createProfile([
            'nameEN' => 'University of Kaposvár',
            'nameDB' => 'KAPOSVÁRI EGYETEM',
            'nameORG' => 'KAPOSVÁRI EGYETEM',
            'xchangeID' => 337,
            'xchangeLink' => '337-kaposvar-university',
            'web' => 'http://english.ke.hu/',
            'city' => City::add('Kaposvár', 'HU')
        ]);
        University::createProfile([
            'nameEN' => 'HANYANG UNIVERSITY',
            'nameDB' => 'HANYANG UNIVERSITY',
            'nameORG' => 'HANYANG UNIVERSITY',
            'xchangeID' => 256,
            'xchangeLink' => '256-hanyang-university',
            'web' => 'https://www.hanyang.ac.kr/web/eng/home/',
            'city' => City::add('Seoul', 'KR')
        ]);
        University::createProfile([
            'nameEN' => 'MAPÚA UNIVERSITY',
            'nameDB' => 'Mapúa Institute of Technology',
            'nameORG' => 'MAPÚA UNIVERSITY',
            'xchangeID' => 402,
            'xchangeLink' => '402-mapua-university',
            'web' => 'https://www.mapua.edu.ph/',
            'city' => City::add('Manila', 'PH')
        ]);
        University::createProfile([
            'nameEN' => 'Tallinn Health Care College',
            'nameDB' => 'Tallinna Tervishoiu Korgkool',
            'nameORG' => 'Tallinna Tervishoiu Korgkool',
            'xchangeID' => 129,
            'xchangeLink' => '129-tallinn-health-care-college',
            'web' => 'https://www.ttk.ee/en',
            'city' => City::add('Tallinn', 'EE')
        ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'ASSOCIATION INTERNATIONALE POUR LA FORMATION',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        University::createProfile([
            'nameEN' => 'Università di Genova',
            'nameDB' => 'UNIVERSITA DEGLI STUDI DI GENOVA',
            'nameORG' => 'UNIVERSITÀ DEGLI STUDI DI GENOVA',
            'xchangeID' => 181,
            'xchangeLink' => '181-universita-degli-studi-di-genova',
            'web' => 'https://unige.it/en',
            'city' => City::add('Genova', 'IT')
        ]);
        University::createProfile([
            'nameEN' => 'JOSIP JURAJ STROSSMAYER UNIVERSITY OF OSIJEK',
            'nameDB' => 'Josip Juraj Strossmayer University of Osijek',
            'nameORG' => 'JOSIP JURAJ STROSSMAYER UNIVERSITY OF OSIJEK',
            'xchangeID' => 78,
            'xchangeLink' => '78-josip-juraj-strossmayer-university-of-osijek',
            'web' => 'http://www.unios.hr/en/',
            'city' => City::add('Osijek', 'HR')
        ]);
        University::createProfile([
            'nameEN' => 'Soongsil University',
            'nameDB' => 'Soongsil University',
            'nameORG' => 'Soongsil University',
            'xchangeID' => 398,
            'xchangeLink' => '398-soongsil-university',
            'web' => 'https://eng.ssu.ac.kr/',
            'city' => City::add('DONGJAK-GU', 'KR')
        ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'Limkokwing Universityof Creative Technology',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        University::createProfile([
            'nameEN' => 'National Taipei University of Technology',
            'nameDB' => 'National Taipei University of Technology',
            'nameORG' => 'National Taipei University of Technology',
            'xchangeID' => 267,
            'xchangeLink' => '267-national-taipei-university-of-technology',
            'web' => 'https://www-en.ntut.edu.tw/',
            'city' => City::add('Taipei', 'TW')
        ]);
        University::createProfile([
            'nameEN' => 'Instituto Superior Miguel Torga',
            'nameDB' => 'Instituto Superior Miguel Torga',
            'nameORG' => 'Instituto Superior Miguel Torga',
            'xchangeID' => 68,
            'xchangeLink' => '68-instituto-superior-miguel-torga',
            'web' => 'https://ismt.pt/',
            'city' => City::add('Coimbra', 'PT')
        ]);
        University::createProfile([
            'nameEN' => 'Katholieke Universiteit Leuven',
            'nameDB' => 'KATHOLIEKE UNIVERSITEIT LEUVEN',
            'nameORG' => 'Katholieke Universiteit Leuven',
            'xchangeID' => 81,
            'xchangeLink' => '81-katholieke-universiteit-leuven',
            'web' => 'https://www.kuleuven.be/english/',
            'city' => City::add('Leuven', 'BE')
        ]);
        University::createProfile([
            'nameEN' => 'University of the French West Indies and Guiana',
            'nameDB' => 'UNIVERSITE DES ANTILLES ET DE LA GUYANE',
            'nameORG' => 'UNIVERSITÉ DES ANTILLES ET DE LA GUYANE POINTE-À-PITRE',
            'xchangeID' => 333,
            'xchangeLink' => '333-universite-des-antilles-et-de-la-guyane-pointe-a-pitre',
            'web' => 'http://www.univ-antilles.fr/',
            'city' => City::add('POINTE-À-PITRE', 'FR')
        ]);
        University::createProfile([
            'nameEN' => 'UNIVERSITY OF DUBROVNIK',
            'nameDB' => 'University of Dubrovnik',
            'nameORG' => 'UNIVERSITY OF DUBROVNIK',
            'xchangeID' => 177,
            'xchangeLink' => '177-university-of-dubrovnik',
            'web' => 'http://web.unidu.hr/index_eng.php',
            'city' => City::add('Dubrovnik', 'HR')
        ]);
        University::createProfile([
            'nameEN' => 'UNIVERSITY OF TECHNOLOGY AND ECONOMICS BUDAPEST',
            'nameDB' => 'BUDAPESTI M?SZAKI ÉS GAZDASAGTUDOMANYI EGYETEM',
            'nameORG' => 'Budapesti Műszaki és Gazdaságtudományi Egyetem',
            'xchangeID' => 202,
            'xchangeLink' => '202-university-of-technology-and-economics-budapest',
            'web' => 'http://www.bme.hu/?language=en',
            'city' => City::add('Budapest', 'HU')
        ]);
        University::createProfile([
            'nameEN' => 'Universidade Feevale',
            'nameDB' => 'UNIVERZIDADE FEEVALE',
            'nameORG' => 'UNIVERSIDADE FEEVALE',
            'xchangeID' => 251,
            'xchangeLink' => '251-universidade-feevale',
            'web' => 'https://www.feevale.br/en/',
            'city' => City::add('NOVO HAMBURGO', 'BR')
        ]);
        University::createProfile([
            'nameEN' => 'University of Applied Sciences and Arts Northwestern Switzerland',
            'nameDB' => 'Fachhochschule Nordwestschweiz, Hochschule für Gestaltung und Kunst',
            'nameORG' => 'FACHHOCHSCHULE NORDWESTSCHWEIZ',
            'xchangeID' => 164,
            'xchangeLink' => '164-fachhochschule-nordwestschweiz',
            'web' => 'https://www.fhnw.ch/en/',
            'city' => City::add('Windisch', 'CH')
        ]);
        University::createProfile([
            'nameEN' => 'Graz University of Technology',
            'nameDB' => 'TECHNISCHE UNIVERSITÄT GRAZ',
            'nameORG' => 'TECHNISCHE UNIVERSITÄT GRAZ',
            'xchangeID' => 52,
            'xchangeLink' => '52-technische-universitat-graz',
            'web' => 'https://www.tugraz.at/en/home/',
            'city' => City::add('Graz', 'AT')
        ]);
        University::createProfile([
            'nameEN' => 'Molde University College',
            'nameDB' => 'HOGSKOLEN I MOLDE',
            'nameORG' => 'Høgskolen i Molde',
            'xchangeID' => 288,
            'xchangeLink' => '288-hgskolen-i-molde',
            'web' => 'https://www.himolde.no/english/',
            'city' => City::add('Molde', 'NO')
        ]);
        University::createProfile([
            'nameEN' => 'IZMIR UNIVERSITY',
            'nameDB' => 'Izmir University',
            'nameORG' => 'IZMIR UNIVERSITY',
            'xchangeID' => 73,
            'xchangeLink' => '73-izmir-university',
            'web' => '',
            'city' => City::add('Izmir', 'TR')
        ]);
        University::createProfile([
            'nameEN' => 'INSEEC BBA - European Business Schoo',
            'nameDB' => 'ECOLE DE COMMERCE EUROPEENNE DE BORDEAUX',
            'nameORG' => 'ÉCOLE DE COMMERCE EUROPÉENNE BBA INSEEC BORDEAUX',
            'xchangeID' => 51,
            'xchangeLink' => '51-ecole-de-commerce-europeenne-bba-inseec-bordeaux',
            'web' => 'https://bba.inseec.com/',
            'city' => City::add('Bordeaux', 'FR')
        ]);
        University::createProfile([
            'nameEN' => 'UNIVERSITY OF TAMPERE',
            'nameDB' => 'TAMPEREEN YLIOPISTO',
            'nameORG' => 'Tampereen yliopisto',
            'xchangeID' => 201,
            'xchangeLink' => '201-university-of-tampere',
            'web' => 'https://www.tuni.fi/en',
            'city' => City::add('Tampere', 'FI')
        ]);
        University::createProfile([
            'nameEN' => 'University of Liège',
            'nameDB' => 'UNIVERSITE DE LIEGE',
            'nameORG' => 'université de Liège',
            'xchangeID' => 157,
            'xchangeLink' => '157-universite-de-liege',
            'web' => 'https://www.uliege.be/cms/c_8699436/en/uliege',
            'city' => City::add('Liege', 'BE')
        ]);
        University::createProfile([
            'nameEN' => 'Lusófona University of Porto',
            'nameDB' => 'Universidade Lusófona Do Porto',
            'nameORG' => 'Universidade Lusófona do Porto',
            'xchangeID' => 405,
            'xchangeLink' => '405-universidade-lusofona-do-porto',
            'web' => 'https://www.ulp.pt/en/',
            'city' => City::add('Porto', 'PT')
        ]);
        University::createProfile([
            'nameEN' => 'Academy of Performing Arts in Bratislava',
            'nameDB' => 'VYSOKÁ SKOLA MÚZICKÝCH UMENÍ V BRATISLAVE',
            'nameORG' => 'VYSOKÁ SKOLA MÚZICKÝCH UMENÍ V BRATISLAVE',
            'xchangeID' => 223,
            'xchangeLink' => '223-vysoka-skola-muzickych-umeni-v-bratislave',
            'web' => '',
            'city' => City::add('Bratislava', 'SK')
        ]);
        University::createProfile([
            'nameEN' => 'UNIVERSITY OF LAPLAND',
            'nameDB' => 'LAPIN YLIOPISTO',
            'nameORG' => 'Lapin yliopisto',
            'xchangeID' => 183,
            'xchangeLink' => '183-university-of-lapland',
            'web' => 'https://www.ulapland.fi/EN',
            'city' => City::add('ROVANIEMI', 'FI')
        ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'University of Thessaly',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        University::createProfile([
            'nameEN' => 'PXL University of Applied Sciences and Arts',
            'nameDB' => 'PXL University College',
            'nameORG' => 'PXL University College',
            'xchangeID' => 385,
            'xchangeLink' => '385-pxl-university-college',
            'web' => 'https://www.pxl.be/International.html',
            'city' => City::add('Hasselt', 'BE')
        ]);
        University::createProfile([
            'nameEN' => 'University of Cádiz',
            'nameDB' => 'UNIVERSIDAD DE CÁDIZ',
            'nameORG' => 'UNIVERSIDAD DE CÁDIZ',
            'xchangeID' => 174,
            'xchangeLink' => '174-universidad-de-cadiz',
            'web' => 'https://www.uca.es/?lang=en',
            'city' => City::add('Cádiz', 'ES')
        ]);
        University::createProfile([
            'nameEN' => 'AKADEMIA SZTUK PIEKNYCH IM. JANA MATEJKI W KRAKOWIE',
            'nameDB' => 'AKADEMIA SZTUK PIEKNYCH IM. JANA MATEJKI W KRAKOWIE',
            'nameORG' => 'AKADEMIA SZTUK PIEKNYCH IM. JANA MATEJKI W KRAKOWIE',
            'xchangeID' => 138,
            'xchangeLink' => '138-akademia-sztuk-pieknych-im-jana-matejki-w-krakowie',
            'web' => 'https://www.asp.krakow.pl/',
            'city' => City::add('Krakow', 'PL')
        ]);
        University::createProfile([
            'nameEN' => 'Fulda University of Applied Sciences',
            'nameDB' => 'FACHHOCHSCHULE FULDA',
            'nameORG' => 'HOCHSCHULE FULDA',
            'xchangeID' => 241,
            'xchangeLink' => '241-hochschule-fulda',
            'web' => 'https://www.hs-fulda.de/en/home',
            'city' => City::add('Fulda', 'DE')
        ]);
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
        University::createProfile([
            'nameEN' => 'Loyola University Andalusia',
            'nameDB' => 'FUNDACION UNIVERSIDAD LOYOLA ANDALUCIA',
            'nameORG' => 'UNIVERSIDAD LOYOLA ANDALUCÍA',
            'xchangeID' => 392,
            'xchangeLink' => '392-universidad-loyola-andalucia',
            'web' => 'https://www.uloyola.es/en/',
            'city' => City::add('Cordoba', 'ES')
        ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'State Academy of Fine Arts of Armenia',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        University::createProfile([
            'nameEN' => 'RUBIKA',
            'nameDB' => 'RUBIKA',
            'nameORG' => 'RUBIKA',
            'xchangeID' => 450,
            'xchangeLink' => '450-rubika',
            'web' => 'https://rubika-edu.com',
            'city' => City::add('Valenciennes', 'FR')
        ]);
        University::createProfile([
            'nameEN' => 'UNIVERSITY OF PRIMORSKA',
            'nameDB' => 'UNIVERZA NA PRIMORSKEM',
            'nameORG' => 'UNIVERZA NA PRIMORSKEM',
            'xchangeID' => 194,
            'xchangeLink' => '194-university-of-primorska',
            'web' => 'https://www.upr.si/en',
            'city' => City::add('Koper', 'SI')
        ]);
        University::createProfile([
            'nameEN' => 'NEOMA Business School',
            'nameDB' => 'NEOMA Business School',
            'nameORG' => 'NEOMA Business School',
            'xchangeID' => 99,
            'xchangeLink' => '99-neoma-business-school',
            'web' => 'https://neoma-bs.com',
            'city' => City::add('Paris', 'FR')
        ]);
        University::createProfile([
            'nameEN' => 'UNIVERSITY OF THEATRE AND FILM ARTS',
            'nameDB' => 'SZÍNHÁZ- ÉS FILMM?VÉSZETI EGYETEM',
            'nameORG' => 'Színház- és Filmművészeti Egyetem',
            'xchangeID' => 6,
            'xchangeLink' => '6-university-of-theatre-and-film-arts',
            'web' => 'https://szfi.hu/',
            'city' => City::add('Budapest', 'HU')
        ]);
        University::createProfile([
            'nameEN' => 'University of Paderborn',
            'nameDB' => 'UNIVERSITÄT PADERBORN',
            'nameORG' => 'UNIVERSITÄT PADERBORN',
            'xchangeID' => 190,
            'xchangeLink' => '190-universitat-paderborn',
            'web' => 'https://www.uni-paderborn.de/en/',
            'city' => City::add('Paderborn', 'DE')
        ]);
        University::createProfile([
            'nameEN' => ' National University of Theatre and Film "I.L.Caragiale" Bucharest',
            'nameDB' => 'National University of Theatre and Film "I.L.Caragiale"',
            'nameORG' => 'Universitatea Națională de Artă Teatrală și Cinematografică "I.L. Caragiale"',
            'xchangeID' => 98,
            'xchangeLink' => '98-national-university-of-theatre-and-film-i-l-caragiale-bucharest',
            'web' => 'https://unatc.ro/devunatc/',
            'city' => City::add('Bucharest', 'RO')
        ]);
        University::createProfile([
            'nameEN' => 'Polytechnic of Leiria',
            'nameDB' => 'INSTITUTO POLITÉCNICO DE LEIRIA',
            'nameORG' => ' Instituto Politécnico de Leiria',
            'xchangeID' => 309,
            'xchangeLink' => '309-instituto-politecnico-de-leiria',
            'web' => 'https://www.ipleiria.pt/home/',
            'city' => City::add('Leiria', 'PT')
        ]);
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
        University::createProfile([
            'nameEN' => 'FACHHOCHSCHULE VORARLBERG',
            'nameDB' => 'FACHHOCHSCHULE VORARLBERG GMBH',
            'nameORG' => 'FACHHOCHSCHULE VORARLBERG',
            'xchangeID' => 222,
            'xchangeLink' => '222-fachhochschule-vorarlberg',
            'web' => 'https://www.fhv.at/en/',
            'city' => City::add('Dornbirn', 'AT')
        ]);
        University::createProfile([
            'nameEN' => 'Anadolu University',
            'nameDB' => 'Anadolu Universitesi',
            'nameORG' => 'Anadolu Universitesi',
            'xchangeID' => 13,
            'xchangeLink' => '13-anadolu-university',
            'web' => 'https://www.anadolu.edu.tr/',
            'city' => City::add('ESKIŞEHIR', 'TR')
        ]);
        University::createProfile([
            'nameEN' => 'Toulouse 1 university Capitole',
            'nameDB' => 'UNIVERSITE DES SCIENCES SOCIALES TOULOUSE I',
            'nameORG' => 'UNIVERSITÉ TOULOUSE 1 CAPITOLE',
            'xchangeID' => 205,
            'xchangeLink' => '205-universite-toulouse-1-capitole',
            'web' => 'https://www.ut-capitole.fr/home/',
            'city' => City::add('TOULOUSE', 'FR')
        ]);
        University::createProfile([
            'nameEN' => 'University of Indonesia',
            'nameDB' => 'Universitas Indonesia',
            'nameORG' => 'Universitas Indonesia',
            'xchangeID' => 441,
            'xchangeLink' => '441-universitas-indonesia',
            'web' => 'http://www.ui.ac.id/en/',
            'city' => City::add('Depok', 'ID')
        ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => 'University of Silesia',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        University::createProfile([
            'nameEN' => 'Bauhaus-Universität Weimar',
            'nameDB' => 'BAUHAUS-UNIVERSITÄT WEIMAR',
            'nameORG' => 'Bauhaus-Universität Weimar',
            'xchangeID' => 17,
            'xchangeLink' => '17-bauhaus-universitat-weimar',
            'web' => 'https://www.uni-weimar.de/en/university/start/',
            'city' => City::add('Weimar', 'DE')
        ]);
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
        University::createProfile([
            'nameEN' => 'Riga Technical University',
            'nameDB' => 'Riga Technical University',
            'nameORG' => ' Rīgas Tehniskā universitāte',
            'xchangeID' => 114,
            'xchangeLink' => '114-riga-technical-university',
            'web' => 'https://www.rtu.lv/en',
            'city' => City::add('Riga', 'LV')
        ]);
        University::createProfile([
            'nameEN' => 'Šiauliai University',
            'nameDB' => 'SIAULIAI UNIVERSITY',
            'nameORG' => 'Vilniaus universiteto Šiaulių akademija',
            'xchangeID' => 118,
            'xchangeLink' => '118-siauliai-university',
            'web' => 'https://www.sa.vu.lt/en/',
            'city' => City::add('Šiauliai', 'LT')
        ]);
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
        University::createProfile([
            'nameEN' => ' University of Natural Resources and Life Sciences',
            'nameDB' => 'UNIVERSITÄT FÜR BODENKULTUR WIEN',
            'nameORG' => 'UNIVERSITÄT FÜR BODENKULTUR WIEN',
            'xchangeID' => 457,
            'xchangeLink' => '457-universitat-fur-bodenkultur-wien',
            'web' => 'https://boku.ac.at/en/',
            'city' => City::add('Wien', 'AT')
        ]);
        University::createProfile([
            'nameEN' => 'University of Bologna',
            'nameDB' => 'UNIVERSITA DI BOLOGNA ALMA MATER STUDIORUM',
            'nameORG' => 'UNIVERSITÀ DEGLI STUDI DI BOLOGNA',
            'xchangeID' => 172,
            'xchangeLink' => '172-universita-degli-studi-di-bologna',
            'web' => 'https://www.unibo.it/en/homepage',
            'city' => City::add('Bologna', 'IT')
        ]);
        University::createProfile([
            'nameEN' => 'UNIVERSITY OF NATIONAL AND WORLD ECONOMY',
            'nameDB' => 'UNIVERSITY OF NATIONAL AND WORLD ECONOMY',
            'nameORG' => 'Университет за национално и световно стопанство',
            'xchangeID' => 189,
            'xchangeLink' => '189-university-of-national-and-world-economy',
            'web' => 'https://www.unwe.bg/en/',
            'city' => City::add('Sofia', 'BU')
        ]);
        University::createProfile([
            'nameEN' => 'Lomonosov Moscow State University',
            'nameDB' => 'Lomonosov Moscow State University',
            'nameORG' => 'Московский государственный университет имени М. В. Ломоносова',
            'xchangeID' => 524,
            'xchangeLink' => '524-lomonosov-moscow-state-university',
            'web' => 'https://www.msu.ru/en/',
            'city' => City::add('Moscow', 'RU')
        ]);
        // University::createProfile([
        //     'nameEN' => '',
        //     'nameDB' => '"RISEBA" University of Business Arts and Technology',
        //     'nameORG' => '',
        //     'xchangeID' => ,
        //     'xchangeLink' => '',
        //     'web' => '',
        //     'city' => City::add('', '')
        // ]);
        University::createProfile([
            'nameEN' => 'Technical University of Valencia',
            'nameDB' => 'UNIVERSIDAD POLITÉCNICA DE VALENCIA ',
            'nameORG' => 'UNIVERSIDAD POLITÈCNICA DE VALÈNCIA',
            'xchangeID' => 155,
            'xchangeLink' => '155-universidad-politecnica-de-valencia',
            'web' => 'http://www.upv.es/index-en.html',
            'city' => City::add('Valencia', 'ES')
        ]);
    }
}
