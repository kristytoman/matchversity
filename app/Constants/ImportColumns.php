<?php 

namespace App\Constants;

/**
 * Column names for importing file from STAG.
 * This values are used in App/Models/Validation.
 * 
 */
class ImportColumns 
{
    /**
     * Identification string of student.
     * 
     * @var string
     */
    const STUDENT_ID = 'UTBID';

    /**
     * UTB faculty string.
     * 
     * @var string
     */
    const FACULTY = 'FAKULTA';

    /**
     * The year of mobility.
     * 
     * @var string
     */
    const YEAR = 'AK_ROK';

    /**
     * The semester of mobility.
     * 
     * @var string
     */
    const SEMESTER = 'SEMESTR';

    /**
     * Type of degree of home study.
     * 
     * @var string
     */
    const DEGREE = 'TYP_STUDIA';

    /**
     * The arrival date of the mobility.
     * 
     * @var string
     */
    const START = 'DATUM_VYJEZDU_OD';

    /**
     * The departure date of the mobility.
     * 
     * @var string
     */
    const END = 'DATUM_VYJEZDU_DO';

    /**
     * Name of the university.
     * 
     * @var string
     */
    const UNIVERSITY = 'VS_CIZI';

    /**
     * City of the university.
     * 
     * @var string
     */
    const CITY = 'VS_CIZI_MESTO';

    /**
     * Student's study field code.
     * 
     * @var string
     */
    const FIELD = 'KOD_OBORU_VZDELAVANI';

    /**
     * English name of the foreign course.
     * 
     * @var string
     */
    const FOREIGN_COURSE = 'JINY_NAZEV_PREDMETU';

    /**
     * Codes of the paired home courses.
     * 
     * @var string
     */
    const HOME_COURSE = 'UTB_NAHRAZOVANY_PREDMET';

    /**
     * Pairing state.
     * 
     * @var string
     */
    const PAIRING_TYPE = 'STATUS_ZADANI';
}