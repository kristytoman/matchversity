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
            'xchangeLink' => '178-universitat-duisburg-essen',
            'web' => 'https://www.uni-due.de/en',
            'city' => City::add('Duisburg', 'DE')
        ]);
        University::createProfile([
            'nameEN' => 'Boğaziçi University',
            'nameDB' => 'Bogaziçi Üniversitesi',
            'nameORG' => 'Boğaziçi Üniversitesi',
            'xchangeID' => 334,
            'xchangeLink' => '334-boazici-university',
            'web' => 'http://www.boun.edu.tr/en_US',
            'city' => City::add('Istanbul', 'TR')
        ]);
        University::createProfile([
            'nameEN' => 'Polytechnic Institute of Porto',
            'nameDB' => 'INSTITUTO POLITÉCNICO DO PORTO',
            'nameORG' => 'Instituto Politécnico do Porto',
            'xchangeID' => 67,
            'xchangeLink' => '67-instituto-politecnico-do-porto',
            'web' => 'https://www.ipp.pt/?set_language=en',
            'city' => City::add('Porto', 'PT')
        ]);
        University::createProfile([
            'nameEN' => 'Bezalel Academy of Arts and Design',
            'nameDB' => 'BEZALEL ACADEMY OF ART AND DESIGN - JERUSALEM',
            'nameORG' => 'Bezalel Academy of Arts and Design',
            'xchangeID' => 254,
            'xchangeLink' => '254-bezalel-academy-of-arts-and-design',
            'web' => 'http://www.bezalel.ac.il/en/',
            'city' => City::add('Jerusalem', 'IL')
        ]);
        University::createProfile([
            'nameEN' => 'University of Malaya',
            'nameDB' => 'University of Malaya',
            'nameORG' => 'Universiti Malaya',
            'xchangeID' => 300,
            'xchangeLink' => '300-university-of-malaya',
            'web' => 'https://www.um.edu.my',
            'city' => City::add('Kuala Lumpur', 'MY')
        ]);
        University::createProfile([
            'nameEN' => 'University of Algarve',
            'nameDB' => 'UNIVERSIDADE DO ALGARVE',
            'nameORG' => 'Universidade do Algarve',
            'xchangeID' => 162,
            'xchangeLink' => '162-universidade-do-algarve',
            'web' => 'https://www.ualg.pt/en',
            'city' => City::add('Faro', 'PT')
        ]);
        University::createProfile([
            'nameEN' => 'Tallinn University of Technology',
            'nameDB' => 'TALLINNA TEHNIKAÜLIKOOL',
            'nameORG' => 'Tallinna Tehnikaülikool',
            'xchangeID' => 131,
            'xchangeLink' => '131-tallinn-university-of-technology',
            'web' => 'https://www.taltech.ee/en/',
            'city' => City::add('Tallinn', 'EE')
        ]);
        University::createProfile([
            'nameEN' => 'LAB University of Applied Sciences',
            'nameDB' => 'Saimaan Ammattikorkeakoulu',
            'nameORG' => 'LAB-ammattikorkeakoulu',
            'xchangeID' => 116,
            'xchangeLink' => '116-saimaa-university-of-applied-sciences',
            'web' => 'https://www.lab.fi/en',
            'city' => City::add('Lahti', 'FI')
        ]);
        University::createProfile([
            'nameEN' => 'Galway-Mayo Institute of Technology',
            'nameDB' => 'GALWAY MAYO INSTITUTE OF TECHNOLOGY',
            'nameORG' => 'Institúid Teicneolaíochta na Gaillimhe-Maigh Eo',
            'xchangeID' => 47,
            'xchangeLink' => '47-galway-mayo-institute-of-technology',
            'web' => 'https://www.gmit.ie',
            'city' => City::add('Galway', 'IE')
        ]);
        University::createProfile([
            'nameEN' => 'Shih Hsin University',
            'nameDB' => 'Shih Hsin University',
            'nameORG' => 'Shih Hsin University',
            'xchangeID' => 268,
            'xchangeLink' => '268-shih-hsin-university',
            'web' => 'http://english.web.shu.edu.tw',
            'city' => City::add('Taipei', 'TW')
        ]);
        University::createProfile([
            'nameEN' => 'Polytechnic Institute of Viana do Castelo',
            'nameDB' => 'INSTITUTO POLITÉCNICO DE VIANA DO CASTELO',
            'nameORG' => 'Instituto Politécnico de Viana do Castelo',
            'xchangeID' => 66,
            'xchangeLink' => '66-instituto-politecnico-de-viana-do-castelo',
            'web' => 'http://internacional.ipvc.pt/en/node/20',
            'city' => City::add('Viana do Castelo', 'PT')
        ]);
        University::createProfile([
            'nameEN' => 'University of Porto',
            'nameDB' => 'UNIVERSIDADE DO PORTO',
            'nameORG' => 'Universidade do Porto',
            'xchangeID' => 150,
            'xchangeLink' => '150-universidade-do-porto',
            'web' => 'https://sigarra.up.pt/up/en/WEB_BASE.GERA_PAGINA?p_pagina=home',
            'city' => City::add('Porto', 'PT')
        ]);
        University::createProfile([
            'nameEN' => 'Estonian Academy of Arts',
            'nameDB' => 'EESTI KUNSTIAKADEEMIA',
            'nameORG' => 'Eesti Kunstiakadeemia',
            'xchangeID' => 39,
            'xchangeLink' => '39-estonian-academy-of-arts',
            'web' => 'https://www.artun.ee/en/home/',
            'city' => City::add('Tallinn', 'EE')
        ]);
        University::createProfile([
            'nameEN' => 'University of Vigo',
            'nameDB' => 'UNIVERSIDAD DE VIGO',
            'nameORG' => 'Universidade de Vigo',
            'xchangeID' => 144,
            'xchangeLink' => '144-universidad-de-vigo',
            'web' => 'https://www.uvigo.gal/en',
            'city' => City::add('Vigo', 'ES')
        ]);
        University::createProfile([
            'nameEN' => 'Academy of Fine Arts in Katowice',
            'nameDB' => 'AKADEMIA SZTUK PIEKNYCH W KATOWICACH (ASP)',
            'nameORG' => 'Akademia Sztuk Pięknych w Katowicach',
            'xchangeID' => 137,
            'xchangeLink' => '137-akademia-sztuk-pieknych-katowice',
            'web' => 'https://asp.katowice.pl/en',
            'city' => City::add('Katowice', 'PL')
        ]);
        University::createProfile([
            'nameEN' => 'Erasmus Brussels University of Applied Sciences and Arts',
            'nameDB' => 'ERASMUSHOGESCHOOL BRUSSEL',
            'nameORG' => 'Erasmushogeschool Brussel',
            'xchangeID' => 37,
            'xchangeLink' => '37-erasmushogeschool-brussel',
            'web' => 'https://www.erasmushogeschool.be/en',
            'city' => City::add('Brussels', 'BE')
        ]);
        University::createProfile([
            'nameEN' => 'University of Aveiro',
            'nameDB' => 'UNIVERSIDADE DE AVEIRO',
            'nameORG' => 'Universidade de Aveiro',
            'xchangeID' => 171,
            'xchangeLink' => '171-universidade-de-aveiro',
            'web' => 'https://www.ua.pt',
            'city' => City::add('Aveiro', 'PT')
        ]);
        University::createProfile([
            'nameEN' => 'Art Academy of Latvia',
            'nameDB' => 'LATVIJAS MAKSLAS AKADEMIJA',
            'nameORG' => 'Latvijas Mākslas akadēmija',
            'xchangeID' => 14,
            'xchangeLink' => '14-art-academy-of-latvia',
            'web' => 'https://www.lma.lv/en',
            'city' => City::add('Riga', 'LV')
        ]);
        University::createProfile([
            'nameEN' => 'NHL Stenden University of Applied Sciences',
            'nameDB' => 'NHL Stenden University of Applied Sciences',
            'nameORG' => 'NHL Stenden Hogeschool',
            'xchangeID' => 101,
            'xchangeLink' => '101-nhl-stenden-hogeschool',
            'web' => 'https://www.nhlstenden.com/en',
            'city' => City::add('Leeuwarden', 'NL')
        ]);
        University::createProfile([
            'nameEN' => 'University of Castilla–La Mancha',
            'nameDB' => 'UNIVERSIDAD DE CASTILLA-LA MANCHA',
            'nameORG' => 'Universidad de Castilla-La Mancha',
            'xchangeID' => 145,
            'xchangeLink' => 'https://xchange.utb.cz/instituce/145-universidad-de-castilla-la-mancha',
            'web' => 'https://www.uclm.es/?sc_lang=en',
            'city' => City::add('Ciudad Real', 'ES')
        ]);
        University::createProfile([
            'nameEN' => 'Karadeniz Technical University',
            'nameDB' => 'Karadeniz Teknik Universitesi',
            'nameORG' => 'Karadeniz Teknik Üniversitesi',
            'xchangeID' => 80,
            'xchangeLink' => '80-karadeniz-technical-university',
            'web' => 'https://www.ktu.edu.tr/en',
            'city' => City::add('Trabzon', 'TR')
        ]);
        University::createProfile([
            'nameEN' => 'Chemnitz University of Technology',
            'nameDB' => 'TECHNISCHE UNIVERSITÄT CHEMNITZ',
            'nameORG' => 'Technische Universität Chemnitz',
            'xchangeID' => 58,
            'xchangeLink' => '58-technische-universitat-chemnitz',
            'web' => 'https://www.tu-chemnitz.de/index.html.en',
            'city' => City::add('Chemnitz', 'DE')
        ]);
        University::createProfile([
            'nameEN' => 'Institute of Technology Carlow',
            'nameDB' => 'INSTITUTE OF TECHNOLOGY CARLOW',
            'nameORG' => 'Institiúid Teicneolaíochta Cheatharlach',
            'xchangeID' => 397,
            'xchangeLink' => '397-institute-of-technology-carlow',
            'web' => 'https://www.itcarlow.ie',
            'city' => City::add('Carlow', 'IE')
        ]);
        University::createProfile([
            'nameEN' => 'Institute of Technology Tralee',
            'nameDB' => 'INSTITUTE OF TECHNOLOGY TRALEE',
            'nameORG' => 'Institiúid Teicneolaíochta Thrá Lí',
            'xchangeID' => 62,
            'xchangeLink' => '62-institute-of-technology-tralee',
            'web' => 'https://www.ittralee.ie/en/',
            'city' => City::add('Tralee', 'IE')
        ]);
        University::createProfile([
            'nameEN' => 'Dortmund University of Applied Sciences and Arts',
            'nameDB' => 'FACHHOCHSCHULE DORTMUND',
            'nameORG' => 'Fachhochschule Dortmund',
            'xchangeID' => 41,
            'xchangeLink' => '41-fachhochschule-dortmund',
            'web' => 'https://www.fh-dortmund.de/en/index.php',
            'city' => City::add('Dortmund', 'DE')
        ]);
        University::createProfile([
            'nameEN' => 'The Academy of Fine Arts and Design',
            'nameDB' => 'VYSOKA SKOLA VYTVARNYCH UMENI V BRATISLAVE',
            'nameORG' => 'Vysoká škola výtvarných umení v Bratislave',
            'xchangeID' => 224,
            'xchangeLink' => '224-vysoka-skola-vytvarnych-umeni-v-bratislave',
            'web' => 'https://www.vsvu.sk/en/',
            'city' => City::add('Bratislava', 'SK')
        ]);
        University::createProfile([
            'nameEN' => 'Polytechnic University of Milan',
            'nameDB' => 'POLITECNICO DI MILANO',
            'nameORG' => 'Politecnico di Milano',
            'xchangeID' => 111,
            'xchangeLink' => '111-politecnico-di-milano',
            'web' => 'https://www.polimi.it/en/',
            'city' => City::add('Milan', 'IT')
        ]);
        University::createProfile([
            'nameEN' => 'St. Pölten University of Applied Sciences',
            'nameDB' => 'St. Pölten University of Applied Sciences',
            'nameORG' => 'Fachhochschule St. Pölten',
            'xchangeID' => 126,
            'xchangeLink' => '126-fachhochschule-st-polten',
            'web' => 'https://www.fhstp.ac.at/en?set_language=en',
            'city' => City::add('Sankt Pölten', 'AT')
        ]);
        University::createProfile([
            'nameEN' => 'West Pomeranian University of Technology',
            'nameDB' => 'West Pomeranian University of Technology',
            'nameORG' => 'Zachodniopomorski Uniwersytet Technologiczny w Szczecinie',
            'xchangeID' => 230,
            'xchangeLink' => '230-zachodniopomorski-uniwersytet-technologiczny-w-szczecinie',
            'web' => 'https://www.zut.edu.pl/EN/university.html',
            'city' => City::add('Szczecin', 'PL')
        ]);
        University::createProfile([
            'nameEN' => 'University of Ljubljana',
            'nameDB' => 'UNIVERZA V LJUBLJANI',
            'nameORG' => 'Univerza v Ljubljani',
            'xchangeID' => 7,
            'xchangeLink' => '7-university-of-ljubljana',
            'web' => 'https://www.uni-lj.si/eng/',
            'city' => City::add('Ljubljana', 'SI')
        ]);
        University::createProfile([
            'nameEN' => 'Dania Academy',
            'nameDB' => 'Dania Academy, University of Higher Education/University of Applied Sciences',
            'nameORG' => 'Erhvervsakademi Dania',
            'xchangeID' => 28,
            'xchangeLink' => '28-dania-academy-of-higher-education',
            'web' => 'https://eadania.com',
            'city' => City::add('Randers', 'DK')
        ]);
        University::createProfile([
            'nameEN' => 'IDRAC Business School',
            'nameDB' => 'IDRAC - International School of Management',
            'nameORG' => 'Institut pour le Développement et la Recherche d\'Action Commerciale',
            'xchangeID' => 59,
            'xchangeLink' => '59-idrac-business-school',
            'web' => 'https://www.idrac-business-school.com',
            'city' => City::add('Lyon', 'FR')
        ]);
        University::createProfile([
            'nameEN' => 'Design School Kolding',
            'nameDB' => 'DESIGNSKOLEN KOLDING',
            'nameORG' => 'Designskolen Kolding',
            'xchangeID' => 86,
            'xchangeLink' => '86-kolding-school-of-design',
            'web' => 'https://www.designskolenkolding.dk/en',
            'city' => City::add('Kolding', 'DK')
        ]);
        University::createProfile([
            'nameEN' => 'Academy of Fine Arts In Łódź',
            'nameDB' => 'Academy of Fine Arts in Lodz (ASP)',
            'nameORG' => 'Akademia Sztuk Pięknych im. Władysława Strzemińskiego',
            'xchangeID' => 128,
            'xchangeLink' => '128-akademia-sztuk-pieknych-im-wladyslawa-strzeminskiego-w-lodzi',
            'web' => 'https://www.asp.lodz.pl/index.php/pl/',
            'city' => City::add('Łódź', 'PL')
        ]);
        University::createProfile([
            'nameEN' => 'University of Applied Sciences Technikum Wien',
            'nameDB' => 'TECHNIKUM WIEN',
            'nameORG' => 'Fachhochschule Technikum Wien',
            'xchangeID' => 163,
            'xchangeLink' => '163-fachhochschule-technikum-wien',
            'web' => 'https://www.technikum-wien.at/en/',
            'city' => City::add('Wien', 'AT')
        ]);
        University::createProfile([
            'nameEN' => 'Tampere University of Applied Sciences',
            'nameDB' => 'PIRKANMAAN AMMATTIKORKEAKOULU',
            'nameORG' => 'Tampereen ammattikorkeakoulu',
            'xchangeID' => 132,
            'xchangeLink' => '132-tampere-university-of-applied-sciences',
            'web' => 'https://www.tuni.fi/en',
            'city' => City::add('Tampere', 'FI')
        ]);
        University::createProfile([
            'nameEN' => 'University of Klagenfurt',
            'nameDB' => 'UNIVERSITÄT KLAGENFURT',
            'nameORG' => 'Universität Klagenfurt',
            'xchangeID' => 12,
            'xchangeLink' => '12-alpen-adria-universitat-klagenfurt',
            'web' => 'https://www.aau.at/en/',
            'city' => City::add('Klagenfurt', 'AT')
        ]);
        University::createProfile([
            'nameEN' => 'Tallinn University',
            'nameDB' => 'TALLINNA ÜLIKOOL',
            'nameORG' => 'Tallinna Ülikool',
            'xchangeID' => 130,
            'xchangeLink' => '130-tallinn-university',
            'web' => 'https://www.tlu.ee/en',
            'city' => City::add('Tallinn', 'EE')
        ]);
        University::createProfile([
            'nameEN' => 'Vilnius Art Academy',
            'nameDB' => 'VILNIAUS DAILES AKADEMIJA',
            'nameORG' => 'Vilniaus dailės akademija',
            'xchangeID' => 272,
            'xchangeLink' => '272-vilnius-academy-of-arts',
            'web' => 'https://www.vda.lt/en/',
            'city' => City::add('Vilnius', 'LT')
        ]);
        University::createProfile([
            'nameEN' => 'University of Maribor',
            'nameDB' => 'UNIVERZA V MARIBORU',
            'nameORG' => 'Univerza v Mariboru',
            'xchangeID' => 187,
            'xchangeLink' => '187-university-of-maribor',
            'web' => 'https://www.um.si/en/Pages/default.aspx',
            'city' => City::add('Maribor', 'SI')
        ]);
        University::createProfile([
            'nameEN' => 'Vilnius Gediminas Technical University',
            'nameDB' => 'VILNIAUS GEDIMINO TECHNIKOS UNIVERSITETAS (VGTU)',
            'nameORG' => 'Vilniaus Gedimino technikos universitetas',
            'xchangeID' => 220,
            'xchangeLink' => '220-vilnius-gediminas-technical-university',
            'web' => 'https://vilniustech.lt/index.php?lang=2',
            'city' => City::add('Vilnius', 'LT')
        ]);
        University::createProfile([
            'nameEN' => 'European University Cyprus',
            'nameDB' => 'European University Cyprus',
            'nameORG' => 'European University Cyprus',
            'xchangeID' => 40,
            'xchangeLink' => '40-european-university-cyprus',
            'web' => 'https://euc.ac.cy/en/',
            'city' => City::add('Nicosia', 'CY')
        ]);
        University::createProfile([
            'nameEN' => 'University of Vaasa',
            'nameDB' => 'VAASAN YLIOPISTO',
            'nameORG' => 'Vaasan yliopisto',
            'xchangeID' => 208,
            'xchangeLink' => '208-university-of-vaasa',
            'web' => 'https://www.univaasa.fi/en',
            'city' => City::add('Vaasa', 'FI')
        ]);
        University::createProfile([
            'nameEN' => 'Polytechnical Institute of Beja',
            'nameDB' => 'INSTITUTO POLITÉCNICO DE BEJA',
            'nameORG' => 'Instituto Politécnico de Beja',
            'xchangeID' => 64,
            'xchangeLink' => '64-instituto-politecnico-de-beja',
            'web' => 'https://www.ipbeja.pt/en/Pages/default.aspx',
            'city' => City::add('Beja', 'PT')
        ]);
        University::createProfile([
            'nameEN' => 'Volda University College',
            'nameDB' => 'HOGSKULEN I VOLDA',
            'nameORG' => 'Høgskulen i Volda',
            'xchangeID' => 221,
            'xchangeLink' => '221-hgskolen-i-volda',
            'web' => 'https://www.hivolda.no/en',
            'city' => City::add('Volda', 'NO')
        ]);
        University::createProfile([
            'nameEN' => 'Technical University of Madrid',
            'nameDB' => 'UNIVERSIDAD POLITÉCNICA DE MADRID',
            'nameORG' => 'Universidad Politécnica de Madrid',
            'xchangeID' => 287,
            'xchangeLink' => '287-universidad-politecnica-de-madrid',
            'web' => 'https://www.upm.es/internacional',
            'city' => City::add('Madrid', 'ES')
        ]);
        University::createProfile([
            'nameEN' => 'University of Lille',
            'nameDB' => 'UNIVERSITE CHARLES DE GAULLE - LILLE III',
            'nameORG' => 'Université de Lille',
            'xchangeID' => 158,
            'xchangeLink' => '158-universite-lille-3',
            'web' => 'https://www.univ-lille.fr/home/',
            'city' => City::add('Lille', 'FR')
        ]);
        University::createProfile([
            'nameEN' => 'Pontifical University of Salamanca',
            'nameDB' => 'UNIVERSIDAD PONTIFICIA DE SALAMANCA',
            'nameORG' => 'Universidad Pontificia de Salamanca',
            'xchangeID' => 149,
            'xchangeLink' => '149-universidad-pontificia-de-salamanca',
            'web' => 'https://www.upsa.es',
            'city' => City::add('Salamanca', 'ES')
        ]);
        University::createProfile([
            'nameEN' => 'Catholic University of Portugal',
            'nameDB' => 'UNIVERSIDADE CATÓLICA PORTUGUESA',
            'nameORG' => 'Universidade Católica Portuguesa',
            'xchangeID' => 23,
            'xchangeLink' => '23-universidade-catolica-portuguesa',
            'web' => 'https://www.ucp.pt/?set_language=en',
            'city' => City::add('Lisbon', 'PT')
        ]);
        University::createProfile([
            'nameEN' => 'Letterkenny Institute of Technology',
            'nameDB' => 'LETTERKENNY INSTITUTE OF TECHNOLOGY',
            'nameORG' => 'Institiúid Teicneolaíochta Leitir Ceanainn',
            'xchangeID' => 89,
            'xchangeLink' => '89-letterkenny-institute-of-technology',
            'web' => 'https://www.lyit.ie/Home',
            'city' => City::add('Letterkenny', 'IE')
        ]);
        University::createProfile([
            'nameEN' => 'Ionian University',
            'nameDB' => 'IONIO PANEPISTIMIO',
            'nameORG' => 'Ionio Panepistimio',
            'xchangeID' => 69,
            'xchangeLink' => '69-ionian-university',
            'web' => 'https://ionio.gr/en/',
            'city' => City::add('Corfu', 'GR')
        ]);
        University::createProfile([
            'nameEN' => 'BINUS University',
            'nameDB' => 'Binus University, Jl. Kebon Jeruk Raya No. 27',
            'nameORG' => 'Universitas Bina Nusantara',
            'xchangeID' => 258,
            'xchangeLink' => '258-binus-university',
            'web' => 'https://binus.ac.id',
            'city' => City::add('Jakarta', 'ID')
        ]);
        University::createProfile([
            'nameEN' => 'Nottingham Trent University',
            'nameDB' => 'THE NOTTINGHAM TRENT UNIVERSITY',
            'nameORG' => 'Nottingham Trent University',
            'xchangeID' => 102,
            'xchangeLink' => '102-nottingham-trent-university',
            'web' => 'https://www.ntu.ac.uk',
            'city' => City::add('Nottingham', 'GB')
        ]);
        University::createProfile([
            'nameEN' => 'Frankfurt University of Applied Sciences',
            'nameDB' => 'FACHHOCHSCHULE FRANKFURT AM MAIN - UNIVERSITY OF APPLIED SCIENCES',
            'nameORG' => 'Frankfurt University of Applied Sciences',
            'xchangeID' => 165,
            'xchangeLink' => '165-fachhochschule-frankfurt-am-main',
            'web' => 'https://www.frankfurt-university.de/en/',
            'city' => City::add('Frankfurt am Main', 'DE')
        ]);
        University::createProfile([
            'nameEN' => 'University of Zagreb',
            'nameDB' => 'University of Zagreb',
            'nameORG' => 'Sveučilište u Zagrebu',
            'xchangeID' => 211,
            'xchangeLink' => '211-university-of-zagreb',
            'web' => 'http://www.unizg.hr/homepage/',
            'city' => City::add('Zagreb', 'HR')
        ]);
        University::createProfile([
            'nameEN' => 'University Colleges Leuven-Limburg',
            'nameDB' => 'KATHOLIEKE HOGESCHOOL LIMBURG',
            'nameORG' => 'University Colleges Leuven-Limburg',
            'xchangeID' => 92,
            'xchangeLink' => '92-katholieke-hogeschool-limburg',
            'web' => 'https://www.ucll.be/international',
            'city' => City::add('Diepenbeek', 'BE')
        ]);
        University::createProfile([
            'nameEN' => 'Alexander Dubcek University in Trencin',
            'nameDB' => 'TRENCIANSKA UNIVERZITA ALEXANDRA DUBCEKA V TRENCINE',
            'nameORG' => 'Trenčianska univerzita Alexandra Dubčeka v Trenčíne',
            'xchangeID' => 10,
            'xchangeLink' => '10-trencianska-univerzita-alexandra-dubceka-v-trencine',
            'web' => 'https://tnuni.sk/',
            'city' => City::add('Trenčín', 'SK')
        ]);
        University::createProfile([
            'nameEN' => 'Athens University of Economics and Business',
            'nameDB' => 'IKONOMIKO PANEPISTIMIO ATHINON',
            'nameORG' => 'Oikonomiko Panepistimio Athinon',
            'xchangeID' => 15,
            'xchangeLink' => '15-athens-university-of-economics-and-business',
            'web' => 'https://www.aueb.gr/en',
            'city' => City::add('Athens', 'GR')
        ]);
        University::createProfile([
            'nameEN' => 'Deggendorf Institute of Technology',
            'nameDB' => 'Deggendorf Institute of Technlogy',
            'nameORG' => 'Deggendorf Institute of Technology',
            'xchangeID' => 284,
            'xchangeLink' => '284-deggendorf-institute-of-technology',
            'web' => 'https://www.th-deg.de/en',
            'city' => City::add('Deggendorf', 'DE')
        ]);
        University::createProfile([
            'nameEN' => 'The Eugeniusz Geppert Academy of Fine Arts in Wrocław',
            'nameDB' => 'AKADEMIA SZTUK PIEKNYCH',
            'nameORG' => 'Akademia Sztuk Pięknych im. Eugeniusza Gepperta we Wrocławiu',
            'xchangeID' => 30,
            'xchangeLink' => '30-akademia-sztuk-pieknych-im-eugeniusza-gepperta-we-wroclawiu',
            'web' => 'https://www.asp.wroc.pl/?lang=en',
            'city' => City::add('Wrocław', 'PL')
        ]);
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
            'nameEN' => 'Dokuz Eylül University',
            'nameDB' => 'Dokuz Eylül Üniversitesi',
            'nameORG' => 'Dokuz Eylül Üniversitesi ',
            'xchangeID' => 29,
            'xchangeLink' => '29-dokuz-eylul-university',
            'web' => 'https://global.deu.edu.tr/',
            'city' => City::add('Izmir', 'TR')
        ]);
        University::createProfile([
            'nameEN' => 'Zhejiang University',
            'nameDB' => 'Zhejiang University',
            'nameORG' => 'Zhejiang University',
            'xchangeID' => null,
            'xchangeLink' => '',
            'web' => 'https://www.zju.edu.cn/english/',
            'city' => City::add('Hangzhou', 'CN')
        ]);
        University::createProfile([
            'nameEN' => 'Haute école des arts du Rhin',
            'nameDB' => 'Haute École des Arts du Rhin (HEAR)',
            'nameORG' => 'Haute École des arts du Rhin',
            'xchangeID' => 250,
            'xchangeLink' => '250-haute-ecole-des-arts-du-rhin-strasbourg',
            'web' => 'https://www.hear.fr/',
            'city' => City::add('Strasbourg', 'FR')
        ]);
        University::createProfile([
            'nameEN' => 'King Juan Carlos University',
            'nameDB' => 'UNIVERSIDAD REY JUAN CARLOS',
            'nameORG' => 'Universidad Rey Juan Carlos',
            'xchangeID' => 112,
            'xchangeLink' => '112-universidad-rey-juan-carlos',
            'web' => 'https://www.urjc.es/',
            'city' => City::add('Madrid', 'ES')
        ]);
        University::createProfile([
            'nameEN' => 'LUCA School of Arts',
            'nameDB' => 'LUCA - SCHOOL OF ARTS',
            'nameORG' => 'LUCA School of Arts',
            'xchangeID' => 93,
            'xchangeLink' => '93-luca-school-of-arts',
            'web' => 'https://www.luca-arts.be/en',
            'city' => City::add('Brussel', 'BE')
        ]);
        University::createProfile([
            'nameEN' => 'Mimar Sinan Fine Arts University',
            'nameDB' => 'Mimar Sinan Guzel Sanatlar Universitesi',
            'nameORG' => 'Mimar Sinan Güzel Sanatlar Üniversitesi',
            'xchangeID' => 95,
            'xchangeLink' => '95-mimar-sinan-fine-arts-university',
            'web' => 'https://www.msgsu.edu.tr/',
            'city' => City::add('Istanbul', 'TR')
        ]);
        University::createProfile([
            'nameEN' => 'Constantine of Preslav University of Shumen',
            'nameDB' => 'SHUMENSKI UNIVERSITET EPISKOP KONSTANTIN PRESLAVSKI',
            'nameORG' => 'Shumenski universitet Episkop Konstantin Preslavski',
            'xchangeID' => 408,
            'xchangeLink' => '408-konstantin-preslavsky-university-of-shumen',
            'web' => 'http://www.shu.bg/en/english/',
            'city' => City::add('Shumen', 'BG')
        ]);
        University::createProfile([
            'nameEN' => 'ORT Uruguay University',
            'nameDB' => 'Universidad ORT Uruguay',
            'nameORG' => 'Universidad ORT Uruguay',
            'xchangeID' => 365,
            'xchangeLink' => '365-universidad-ort-uruguay',
            'web' => 'https://www.ort.edu.uy/',
            'city' => City::add('Montevideo', 'UY')
        ]);
        University::createProfile([
            'nameEN' => 'University College of Northern Denmark',
            'nameDB' => 'University College of Northern Denmark',
            'nameORG' => 'Professionshøjskolen UCN',
            'xchangeID' => 390,
            'xchangeLink' => '390-university-college-of-northern-denmark',
            'web' => 'https://www.ucn.dk/english',
            'city' => City::add('Aalborg', 'DK')
        ]);
        University::createProfile([
            'nameEN' => 'Klaipėda University',
            'nameDB' => 'KLAIPEDOS UNIVERSITETAS',
            'nameORG' => 'Klaipėdos universitetas',
            'xchangeID' => 85,
            'xchangeLink' => '85-klaipeda-university',
            'web' => 'https://www.ku.lt/en/',
            'city' => City::add('Klaipėda', 'LT')
        ]);
        University::createProfile([
            'nameEN' => 'Technical University of Lisbon',
            'nameDB' => 'Técnico Lisboa',
            'nameORG' => 'Universidade Técnica de Lisboa',
            'xchangeID' => 151,
            'xchangeLink' => '151-universidade-tecnica-de-lisboa',
            'web' => 'https://tecnico.ulisboa.pt/en/',
            'city' => City::add('Lisboa', 'PT')
        ]);
        University::createProfile([
            'nameEN' => 'University of Łódź',
            'nameDB' => 'UNIWERSYTET LÓDZKI',
            'nameORG' => 'Uniwersytet Łódzki',
            'xchangeID' => 185,
            'xchangeLink' => '185-uniwersytet-lodzki',
            'web' => 'https://en.uni.lodz.pl/',
            'city' => City::add('Łódź', 'PL')
        ]);
        University::createProfile([
            'nameEN' => 'Polytechnic Institute of Bragança',
            'nameDB' => 'INSTITUTO POLITÉCNICO DE BRAGANÇA',
            'nameORG' => 'Instituto Politécnico de Bragança',
            'xchangeID' => 239,
            'xchangeLink' => '239-instituto-politecnico-de-braganca',
            'web' => 'http://portal3.ipb.pt/index.php/en/ipben/home',
            'city' => City::add('Bragança', 'PT')
        ]);
        University::createProfile([
            'nameEN' => 'University of the Basque Country',
            'nameDB' => 'UNIVERSIDAD DEL PAÍS VASCO / EUSKAL HERRIKO UNIBERTSITATEA',
            'nameORG' => 'Universidad del País Vasco / Euskal Herriko Unibertsitatea',
            'xchangeID' => null,
            'xchangeLink' => '',
            'web' => 'https://www.ehu.eus/en/en-home',
            'city' => City::add('Leioa', 'ES')
        ]);
        University::createProfile([
            'nameEN' => 'Chalmers University of Technology',
            'nameDB' => 'CHALMERS TEKNISKA HÖGSKOLA',
            'nameORG' => 'Chalmers tekniska högskola',
            'xchangeID' => 57,
            'xchangeLink' => '57-chalmers-tekniska-hogskola',
            'web' => 'https://www.chalmers.se/en/Pages/default.aspx',
            'city' => City::add('Gothenburg', 'SE')
        ]);
        University::createProfile([
            'nameEN' => 'Peter the Great St. Petersburg Polytechnic University',
            'nameDB' => 'Peter the Great St. Petersburg Polytechnic University',
            'nameORG' => 'Peter the Great St. Petersburg Polytechnic University',
            'xchangeID' => null,
            'xchangeLink' => '',
            'web' => 'https://english.spbstu.ru/',
            'city' => City::add('Saint Petersburg', 'RU')
        ]);
        University::createProfile([
            'nameEN' => 'Orléans School of Art and Design',
            'nameDB' => 'Ecole Supérieure d\'Art et de Design d\'Orleans',
            'nameORG' => 'École Supérieure d\'Art et de Design d\'Orléans',
            'xchangeID' => 38,
            'xchangeLink' => '38-ecole-superieure-d-art-et-de-design-d-orleans',
            'web' => 'https://esadorleans.fr/en/home/',
            'city' => City::add('Orléans', 'FR')
        ]);
        University::createProfile([
            'nameEN' => 'University of Kaposvár',
            'nameDB' => 'KAPOSVÁRI EGYETEM',
            'nameORG' => 'Kaposvári Egyetem',
            'xchangeID' => 337,
            'xchangeLink' => '337-kaposvar-university',
            'web' => 'http://english.ke.hu/',
            'city' => City::add('Kaposvár', 'HU')
        ]);
        University::createProfile([
            'nameEN' => 'Hanyang University',
            'nameDB' => 'HANYANG UNIVERSITY',
            'nameORG' => 'Hanyang University',
            'xchangeID' => 256,
            'xchangeLink' => '256-hanyang-university',
            'web' => 'https://www.hanyang.ac.kr/web/eng/home/',
            'city' => City::add('Seoul', 'KR')
        ]);
        University::createProfile([
            'nameEN' => 'Mapúa University',
            'nameDB' => 'Mapúa Institute of Technology',
            'nameORG' => 'Mapúa University',
            'xchangeID' => 402,
            'xchangeLink' => '402-mapua-university',
            'web' => 'https://www.mapua.edu.ph/',
            'city' => City::add('Manila', 'PH')
        ]);
        University::createProfile([
            'nameEN' => 'Tallinn Health Care College',
            'nameDB' => 'Tallinna Tervishoiu Korgkool',
            'nameORG' => 'Tallinna Tervishoiu Kõrgkool',
            'xchangeID' => 129,
            'xchangeLink' => '129-tallinn-health-care-college',
            'web' => 'https://www.ttk.ee/en',
            'city' => City::add('Tallinn', 'EE')
        ]);
        University::createProfile([
            'nameEN' => 'University of Genoa',
            'nameDB' => 'UNIVERSITA DEGLI STUDI DI GENOVA',
            'nameORG' => 'Università di Genova',
            'xchangeID' => 181,
            'xchangeLink' => '181-universita-degli-studi-di-genova',
            'web' => 'https://unige.it/en',
            'city' => City::add('Genova', 'IT')
        ]);
        University::createProfile([
            'nameEN' => 'Josip Juraj Strossmayer University of Osijek',
            'nameDB' => 'Josip Juraj Strossmayer University of Osijek',
            'nameORG' => 'Sveučilište Josipa Jurja Strossmayera u Osijeku',
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
            'city' => City::add('Seoul', 'KR')
        ]);
        University::createProfile([
            'nameEN' => 'Limkokwing University of Creative Technology',
            'nameDB' => 'Limkokwing Universityof Creative Technology',
            'nameORG' => 'Universiti Teknologi Kreatif Limkokwing',
            'xchangeID' => 486,
            'xchangeLink' => '486-limkokwing-university-of-creative-technology',
            'web' => 'https://www.limkokwing.net/',
            'city' => City::add('Cyberjaya', 'MY')
        ]);
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
            'nameEN' => 'Miguel Torga Institute',
            'nameDB' => 'Instituto Superior Miguel Torga',
            'nameORG' => 'Instituto Superior Miguel Torga',
            'xchangeID' => 68,
            'xchangeLink' => '68-instituto-superior-miguel-torga',
            'web' => 'https://ismt.pt/',
            'city' => City::add('Coimbra', 'PT')
        ]);
        University::createProfile([
            'nameEN' => 'KU Leuven',
            'nameDB' => 'KATHOLIEKE UNIVERSITEIT LEUVEN',
            'nameORG' => 'Katholieke Universiteit Leuven',
            'xchangeID' => 81,
            'xchangeLink' => '81-katholieke-universiteit-leuven',
            'web' => 'https://www.kuleuven.be/english/',
            'city' => City::add('Leuven', 'BE')
        ]);
        University::createProfile([
            'nameEN' => 'University of the West Indies',
            'nameDB' => 'UNIVERSITE DES ANTILLES ET DE LA GUYANE',
            'nameORG' => 'Université des Antilles et de la Guyane',
            'xchangeID' => 333,
            'xchangeLink' => '333-universite-des-antilles-et-de-la-guyane-pointe-a-pitre',
            'web' => 'http://bri.univ-antilles.fr/#',
            'city' => City::add('Pointe-à-Pitre', 'GP')
        ]);
        University::createProfile([
            'nameEN' => 'University of Dubrovnik',
            'nameDB' => 'University of Dubrovnik',
            'nameORG' => 'Sveučilište u Dubrovniku',
            'xchangeID' => 177,
            'xchangeLink' => '177-university-of-dubrovnik',
            'web' => 'http://web.unidu.hr/index_eng.php',
            'city' => City::add('Dubrovnik', 'HR')
        ]);
        University::createProfile([
            'nameEN' => 'Budapest University of Technology and Economics',
            'nameDB' => 'BUDAPESTI M?SZAKI ÉS GAZDASAGTUDOMANYI EGYETEM',
            'nameORG' => 'Budapesti Műszaki és Gazdaságtudományi Egyetem',
            'xchangeID' => 202,
            'xchangeLink' => '202-university-of-technology-and-economics-budapest',
            'web' => 'http://www.bme.hu/?language=en',
            'city' => City::add('Budapest', 'HU')
        ]);
        University::createProfile([
            'nameEN' => 'Feevale University',
            'nameDB' => 'UNIVERZIDADE FEEVALE',
            'nameORG' => 'Universidade Feevale',
            'xchangeID' => 251,
            'xchangeLink' => '251-universidade-feevale',
            'web' => 'https://www.feevale.br/en/',
            'city' => City::add('Novo Hamburgo', 'BR')
        ]);
        University::createProfile([
            'nameEN' => 'University of Applied Sciences and Arts Northwestern Switzerland',
            'nameDB' => 'Fachhochschule Nordwestschweiz, Hochschule für Gestaltung und Kunst',
            'nameORG' => 'Fachhochschule Nordwestschweiz',
            'xchangeID' => 164,
            'xchangeLink' => '164-fachhochschule-nordwestschweiz',
            'web' => 'https://www.fhnw.ch/en/',
            'city' => City::add('Windisch', 'CH')
        ]);
        University::createProfile([
            'nameEN' => 'Graz University of Technology',
            'nameDB' => 'TECHNISCHE UNIVERSITÄT GRAZ',
            'nameORG' => 'Technische Universität Graz',
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
            'nameEN' => 'İzmir University of Economics',
            'nameDB' => 'Izmir University',
            'nameORG' => 'İzmir Ekonomi Üniversitesi',
            'xchangeID' => 73,
            'xchangeLink' => '73-izmir-university',
            'web' => 'http://www.ieu.edu.tr/en',
            'city' => City::add('Balçova', 'TR')
        ]);
        University::createProfile([
            'nameEN' => 'BBA INSEEC',
            'nameDB' => 'ECOLE DE COMMERCE EUROPEENNE DE BORDEAUX',
            'nameORG' => 'BBA INSEEC',
            'xchangeID' => 51,
            'xchangeLink' => '51-ecole-de-commerce-europeenne-bba-inseec-bordeaux',
            'web' => 'https://bba.inseec.com/',
            'city' => City::add('Bordeaux', 'FR')
        ]);
        University::createProfile([
            'nameEN' => 'University of Tampere',
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
            'nameORG' => 'Université de Liège',
            'xchangeID' => 157,
            'xchangeLink' => '157-universite-de-liege',
            'web' => 'https://www.uliege.be/cms/c_8699436/en/uliege',
            'city' => City::add('Liege', 'BE')
        ]);
        University::createProfile([
            'nameEN' => 'Lusófona University',
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
            'nameORG' => 'Vysoká škola múzických umení v Bratislave',
            'xchangeID' => 223,
            'xchangeLink' => '223-vysoka-skola-muzickych-umeni-v-bratislave',
            'web' => 'https://www.vsmu.sk/en/',
            'city' => City::add('Bratislava', 'SK')
        ]);
        University::createProfile([
            'nameEN' => 'University of Lapland',
            'nameDB' => 'LAPIN YLIOPISTO',
            'nameORG' => 'Lapin yliopisto',
            'xchangeID' => 183,
            'xchangeLink' => '183-university-of-lapland',
            'web' => 'https://www.ulapland.fi/EN',
            'city' => City::add('Rovaniemi', 'FI')
        ]);
        University::createProfile([
            'nameEN' => 'University of Thessaly',
            'nameDB' => 'University of Thessaly',
            'nameORG' => 'University of Thessaly',
            'xchangeID' => 135,
            'xchangeLink' => '135-technological-educational-institute-of-thessaly',
            'web' => 'https://www.uth.gr/en',
            'city' => City::add('Larissa', 'GR')
        ]);
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
            'nameORG' => 'Universidad de Cádiz',
            'xchangeID' => 174,
            'xchangeLink' => '174-universidad-de-cadiz',
            'web' => 'https://www.uca.es/?lang=en',
            'city' => City::add('Cádiz', 'ES')
        ]);
        University::createProfile([
            'nameEN' => 'Jan Matejko Academy of Fine Arts in Kraków',
            'nameDB' => 'AKADEMIA SZTUK PIEKNYCH IM. JANA MATEJKI W KRAKOWIE',
            'nameORG' => 'Akademia Sztuk Pięknych im. Jana Matejki w Krakowie',
            'xchangeID' => 138,
            'xchangeLink' => '138-akademia-sztuk-pieknych-im-jana-matejki-w-krakowie',
            'web' => 'https://www.asp.krakow.pl/',
            'city' => City::add('Kraków', 'PL')
        ]);
        University::createProfile([
            'nameEN' => 'Fulda University of Applied Sciences',
            'nameDB' => 'FACHHOCHSCHULE FULDA',
            'nameORG' => 'Hochschule Fulda – University of Applied Sciences',
            'xchangeID' => 241,
            'xchangeLink' => '241-hochschule-fulda',
            'web' => 'https://www.hs-fulda.de/en/home',
            'city' => City::add('Fulda', 'DE')
        ]);
        University::createProfile([
            'nameEN' => 'Dalarna University College',
            'nameDB' => 'HÖGSKOLAN DALARNA',
            'nameORG' => 'Högskolan Dalarna',
            'xchangeID' => null,
            'xchangeLink' => '',
            'web' => 'https://www.du.se/en',
            'city' => City::add('Falun', 'SE')
        ]);
        University::createProfile([
            'nameEN' => 'Latvia University of Life Sciences and Technologies',
            'nameDB' => 'LATVIJAS LAUKSAIMNIECÎBAS UNIVERSITÂTE',
            'nameORG' => 'Latvijas Lauksaimniecības universitāte',
            'xchangeID' => 514,
            'xchangeLink' => '514-latvia-university-of-life-sciences-and-technologies',
            'web' => 'https://www.llu.lv/en',
            'city' => City::add('Jelgava', 'LV')
        ]);
        University::createProfile([
            'nameEN' => 'Loyola University Andalusia',
            'nameDB' => 'FUNDACION UNIVERSIDAD LOYOLA ANDALUCIA',
            'nameORG' => 'Universidad Loyola Andalucía',
            'xchangeID' => 392,
            'xchangeLink' => '392-universidad-loyola-andalucia',
            'web' => 'https://www.uloyola.es/en/',
            'city' => City::add('Cordoba', 'ES')
        ]);
        University::createProfile([
            'nameEN' => 'State Academy of Fine Arts of Armenia',
            'nameDB' => 'State Academy of Fine Arts of Armenia',
            'nameORG' => 'State Academy of Fine Arts of Armenia',
            'xchangeID' => null,
            'xchangeLink' => '',
            'web' => 'http://safa.am/?lang=en',
            'city' => City::add('Yerevan', 'AM')
        ]);
        University::createProfile([
            'nameEN' => 'ISD Rubika',
            'nameDB' => 'RUBIKA',
            'nameORG' => 'Institut Supérieur du Design Rubika',
            'xchangeID' => 450,
            'xchangeLink' => '450-rubika',
            'web' => 'https://rubika-edu.com',
            'city' => City::add('Valenciennes', 'FR')
        ]);
        University::createProfile([
            'nameEN' => 'University of Primorska',
            'nameDB' => 'UNIVERZA NA PRIMORSKEM',
            'nameORG' => 'Univerza na Primorskem',
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
            'city' => City::add('Reims', 'FR')
        ]);
        University::createProfile([
            'nameEN' => 'Academy of Drama and Film in Budapest',
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
            'nameORG' => ' Universität Paderborn',
            'xchangeID' => 190,
            'xchangeLink' => '190-universitat-paderborn',
            'web' => 'https://www.uni-paderborn.de/en/',
            'city' => City::add('Paderborn', 'DE')
        ]);
        University::createProfile([
            'nameEN' => 'Caragiale National University of Theatre and Film',
            'nameDB' => 'National University of Theatre and Film "I.L.Caragiale"',
            'nameORG' => 'Universitatea Nationala de Arta Teatrala si Cinematografica "I.L. Caragiale"',
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
        University::createProfile([
            'nameEN' => 'University of Applied Sciences Mittweida',
            'nameDB' => 'HOCHSCHULE MITTWEIDA (FH)',
            'nameORG' => 'Hochschule Mittweida',
            'xchangeID' => null,
            'xchangeLink' => '',
            'web' => 'https://www.hs-mittweida.de/en/',
            'city' => City::add('Mittweida', 'DE')
        ]);
        University::createProfile([
            'nameEN' => 'University Vila Velha',
            'nameDB' => 'Universidade Vila Velha',
            'nameORG' => 'Universidade Vila Velha',
            'xchangeID' => null,
            'xchangeLink' => '',
            'web' => 'https://uvv.br/assessoria-internacional/',
            'city' => City::add('Vitória', 'BR')
        ]);
        University::createProfile([
            'nameEN' => 'Vorarlberg University of Applied Sciences',
            'nameDB' => 'FACHHOCHSCHULE VORARLBERG GMBH',
            'nameORG' => 'Fachhochschule Vorarlberg',
            'xchangeID' => 222,
            'xchangeLink' => '222-fachhochschule-vorarlberg',
            'web' => 'https://www.fhv.at/en/',
            'city' => City::add('Dornbirn', 'AT')
        ]);
        University::createProfile([
            'nameEN' => 'Anadolu University',
            'nameDB' => 'Anadolu Universitesi',
            'nameORG' => 'Anadolu Üniversitesi',
            'xchangeID' => 13,
            'xchangeLink' => '13-anadolu-university',
            'web' => 'https://www.anadolu.edu.tr/',
            'city' => City::add('Eskişehir', 'TR')
        ]);
        University::createProfile([
            'nameEN' => 'Toulouse 1 Capitole University',
            'nameDB' => 'UNIVERSITE DES SCIENCES SOCIALES TOULOUSE I',
            'nameORG' => 'Université Toulouse 1 Capitole',
            'xchangeID' => 205,
            'xchangeLink' => '205-universite-toulouse-1-capitole',
            'web' => 'https://www.ut-capitole.fr/home/',
            'city' => City::add('Toulouse', 'FR')
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
        University::createProfile([
            'nameEN' => 'The University of Silesia in Katowice',
            'nameDB' => 'University of Silesia',
            'nameORG' => 'Uniwersytet Śląski w Katowicach',
            'xchangeID' => null,
            'xchangeLink' => '',
            'web' => 'https://us.edu.pl/en/',
            'city' => City::add('Katowice', 'PL')
        ]);
        University::createProfile([
            'nameEN' => 'Bauhaus University Weimar',
            'nameDB' => 'BAUHAUS-UNIVERSITÄT WEIMAR',
            'nameORG' => 'Bauhaus-Universität Weimar',
            'xchangeID' => 17,
            'xchangeLink' => '17-bauhaus-universitat-weimar',
            'web' => 'https://www.uni-weimar.de/en/university/start/',
            'city' => City::add('Weimar', 'DE')
        ]);
        University::createProfile([
            'nameEN' => 'Udayana University',
            'nameDB' => 'Udayana University',
            'nameORG' => 'Universitas Udayana',
            'xchangeID' => null,
            'xchangeLink' => '',
            'web' => 'https://www.unud.ac.id/?lang=en',
            'city' => City::add('Denpasar', 'ID')
        ]);
        University::createProfile([
            'nameEN' => 'KIMEP University',
            'nameDB' => 'KIMEP University',
            'nameORG' => 'QMEBI Ýnıversıteti',
            'xchangeID' => null,
            'xchangeLink' => '',
            'web' => 'https://www.kimep.kz/en/',
            'city' => City::add('Almaty', 'KZ')
        ]);
        University::createProfile([
            'nameEN' => 'Riga Technical University',
            'nameDB' => 'Riga Technical University',
            'nameORG' => 'Rīgas Tehniskā universitāte',
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
        University::createProfile([
            'nameEN' => 'International Business Academy',
            'nameDB' => 'International Business Academy (IBA)',
            'nameORG' => 'IBA Erhvervsakademi Kolding',
            'xchangeID' => 327,
            'xchangeLink' => '327-international-business-academy',
            'web' => 'https://www.iba.dk/international',
            'city' => City::add('Kolding', 'DK')
        ]);
        University::createProfile([
            'nameEN' => 'IMC University of Applied Sciences Krems',
            'nameDB' => 'IMC FACHHOCHSCHULE KREMS GMBH',
            'nameORG' => 'IMC Fachhochschule Krems',
            'xchangeID' => 227,
            'xchangeLink' => '277-imc-fachhochschule-krems',
            'web' => 'https://www.fh-krems.ac.at/en/',
            'city' => City::add('Krems an der Donau', 'AT')
        ]);
        University::createProfile([
            'nameEN' => 'University of Natural Resources and Life Sciences',
            'nameDB' => 'UNIVERSITÄT FÜR BODENKULTUR WIEN',
            'nameORG' => 'Universität für Bodenkultur Wien',
            'xchangeID' => 457,
            'xchangeLink' => '457-universitat-fur-bodenkultur-wien',
            'web' => 'https://boku.ac.at/en/',
            'city' => City::add('Wien', 'AT')
        ]);
        University::createProfile([
            'nameEN' => 'University of Bologna',
            'nameDB' => 'UNIVERSITA DI BOLOGNA ALMA MATER STUDIORUM',
            'nameORG' => 'Università di Bologna',
            'xchangeID' => 172,
            'xchangeLink' => '172-universita-degli-studi-di-bologna',
            'web' => 'https://www.unibo.it/en/homepage',
            'city' => City::add('Bologna', 'IT')
        ]);
        University::createProfile([
            'nameEN' => 'University of National and World Economy ',
            'nameDB' => 'UNIVERSITY OF NATIONAL AND WORLD ECONOMY',
            'nameORG' => 'University of National and World Economy ',
            'xchangeID' => 189,
            'xchangeLink' => '189-university-of-national-and-world-economy',
            'web' => 'https://www.unwe.bg/en/',
            'city' => City::add('Sofia', 'BG')
        ]);
        University::createProfile([
            'nameEN' => 'Lomonosov Moscow State University',
            'nameDB' => 'Lomonosov Moscow State University',
            'nameORG' => 'Lomonosov Moscow State University',
            'xchangeID' => 524,
            'xchangeLink' => '524-lomonosov-moscow-state-university',
            'web' => 'https://www.msu.ru/en/',
            'city' => City::add('Moscow', 'RU')
        ]);
        University::createProfile([
            'nameEN' => '"RISEBA" University of Business, Arts and Technology',
            'nameDB' => '"RISEBA" University of Business Arts and Technology',
            'nameORG' => 'Biznesa, mākslas un tehnoloģiju augstskola "RISEBA"',
            'xchangeID' => 113,
            'xchangeLink' => '113-riga-international-school-of-economics-and-business-administration',
            'web' => 'https://www.riseba.lv/en/',
            'city' => City::add('Riga', 'LV')
        ]);
        University::createProfile([
            'nameEN' => 'Polytechnic University of Valencia',
            'nameDB' => 'UNIVERSIDAD POLITÉCNICA DE VALENCIA ',
            'nameORG' => 'Universitat Politècnica de València',
            'xchangeID' => 155,
            'xchangeLink' => '155-universidad-politecnica-de-valencia',
            'web' => 'http://www.upv.es/index-en.html',
            'city' => City::add('Valencia', 'ES')
        ]);
    }
}
