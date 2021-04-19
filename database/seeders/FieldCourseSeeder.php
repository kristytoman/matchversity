<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use App\Models\HomeCourse;
use App\Models\Field;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\FieldCourseCollection;

class FieldCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = HomeCourse::all();
        foreach($courses as $key => $course) {
            if ($fields = $this->getFields($course->code)) {
                $save = [];
                foreach ($fields as $data) {
                    if ($field = Field::where('stag_id', '=', $data['id'])->first()) {
                        $save[] = [
                            'field_id' => $field->id,
                            'home_course_id' => $course->id,
                            'grade' => $data['year'],
                            'is_summer' => $data['is_summer'],
                            'compulsory' => $data['compulsory'] 
                        ];
                    }
                }
                DB::table('field_courses')->insert($save);
            }
        }
    }

    /**
     * Get array of field's courses.
     * 
     * @param string  $code
     * @return array|null
     */
    public function getFields($code)
    {
        $params = explode('/', $code);
        $response = Http::withOptions(['verify' => false])->get(
            'https://stag-ws.utb.cz/ws/services/rest2/predmety/getOboryPredmetu', [
            'katedra' => $params[0],
            'zkratka' => $params[1],
            'outputFormat' => 'JSON'
        ]);
        if ($response->ok()) {  
            return FieldCourseCollection::toArray($response->json());
        }
        return null;
    }
}
