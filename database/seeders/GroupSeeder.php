<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomeCourse;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = HomeCourse::all();
        $index = 1;
        foreach ($courses as $course) {
            if (empty(HomeCourse::find($course->id)->group)) {
                $group = HomeCourse::where('name_cz', '=', $course->name_cz)
                        ->orWhere('name_en', '=', $course->name_en)
                        ->orWhere('name_en', '=', $course->name_cz)
                        ->orWhere('name_cz', '=', $course->name_en)->get();
                if ($group->count() > 1) {
                    foreach ($group as $item) {
                        $item->group = $index;
                        $item->save();  
                    }
                    ++$index;
                }
            }
        }
    }
}
