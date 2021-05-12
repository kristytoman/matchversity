<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupHomeCourseRequest;
use App\Models\HomeCourse;

class HomeCourseController extends Controller
{
    /**
     * Display a listing of home courses ordered by name.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home_courses', [
            'courses' => HomeCourse::allOrderedByName()
        ]);
    }

    /**
     * Update courses group.
     *
     * @param  App\Http\Requests\GroupHomeCourseRequest  $request
     * @param  \App\Models\HomeCourse  $homeCourse
     * @return \Illuminate\Http\Response
     */
    public function update(GroupHomeCourseRequest $request, HomeCourse $homeCourse)
    {
        HomeCourse::changeGroups($request->validated());
        return back();  
    }
}
