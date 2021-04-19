<?php

namespace Database\Seeders;

use App\Http\Resources\CourseCollection;
use App\Models\Field;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = Field::all();
        $save = [];
        foreach($fields as $field) {
            if ($courses = $this->getCourses($field->stag_id)) {
                foreach($courses as $key => $course){
                        $column =  array_column($save, 'code');
                        if ((array_search($course['unit'] . '/' . $course['code'], $column) === false)) {
                            $save[] = [
                            'code' => $course['unit'] . '/' . $course['code'],
                            'name_cz' => $this->fetchName($course['unit'], $course['code'], 'cs'),
                            'name_en' => $this->fetchName($course['unit'], $course['code'], 'en')
                        ];
                    }
                }
            }
            else {
                DB::table('fields')->where('id', '=', $field->id)->delete();
            }
        }
        DB::table('home_courses')->insert($save);
    }

    /**
     * Fetch the name from STAG.
     *
     * @param string  $unit
     * @param string  $course
     * @param string  $lang
     * @return string
     */
    public function fetchName($unit, $course, $lang)
    {
        $response = Http::withOptions(['verify' => false])->get(
            'https://stag-ws.utb.cz/ws/services/rest2/predmety/getPredmetInfo', [
            'katedra' => $unit,
            'zkratka' => $course,
            'lang' => $lang,
            'outputFormat' => 'JSON'
        ]);
        if ($response->ok()) {
            if (strlen($response['nazevDlouhy']) > 128) {
                return $response['nazev'];
            } 
            return $response['nazevDlouhy'];
        }
        return null;
    }

    /**
     * Get array of field's courses.
     * 
     * @param int  $id
     * @return array|null
     */
    public function getCourses(int $id)
    {
        $response = Http::withOptions(['verify' => false])->get(
            'https://stag-ws.utb.cz/ws/services/rest2/predmety/getPredmetyByObor', [
                'oborIdno' => $id, 
                'outputFormat' => 'JSON'
            ]);
        if ($response->ok()) {
            return CourseCollection::toArray($response->json());
        }
        return null;
    }
}
