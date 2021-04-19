<?php

namespace Database\Seeders;

use App\Http\Resources\ProgramCollection;
use App\Http\Resources\FieldCollection;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faculties = ['FAI', 'FAM', 'FHS', 'FLK', 'FMK', 'FT'];
        $save = [];
        foreach($faculties as $faculty) {
            if ($programs = $this->getPrograms($faculty)) {
                foreach ($programs as $program) {
                    $fields = $this->getFields($program['id']);
                    foreach($fields as $field) {
                        $save[] = [
                            'title' => $field['title'],
                            'stag_id' => $field['id'],
                            'faculty' => $faculty,
                            'lang' => $field['lang'],
                            'from' => $field['from'],
                            'degree' => $field['type'],
                            'fulltime' => $field['form']
                        ];
                    }
                }
            }
        }
        DB::table('fields')->insert($save);
    }

    /**
     * Get array of university's study programs.
     * 
     * @param string  $id
     * @return array|null
     */
    public function getPrograms(string $id)
    {
        $response = Http::withOptions(['verify' => false])->get(
            'https://stag-ws.utb.cz/ws/services/rest2/programy/getStudijniProgramy', [
                'fakulta' => $id,
                'outputFormat' => 'JSON'
            ]);
        if ($response->ok()) {
            return ProgramCollection::toArray($response->json());
        }
        else return null;
    }

    /**
     * Get array of program's fields.
     * 
     * @param int  $id
     * @return array|null
     */
    public function getFields($id)
    {
        $response = Http::withOptions(['verify' => false])->get(
            'https://stag-ws.utb.cz/ws/services/rest2/programy/getOboryStudijnihoProgramu', [
            'stprIdno' => $id,
            'rok' => Carbon::now()->year,
            'outputFormat' => 'JSON'
        ]);
        if ($response->ok()) {
            return FieldCollection::toArray($response->json());
        }
        return null;
    }
}
