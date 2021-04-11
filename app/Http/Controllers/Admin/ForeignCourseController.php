<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateForeignCourseRequest;
use App\Models\ForeignCourse;
use App\Models\University;

class ForeignCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.foreign_courses', [
            'universities' => University::with('foreignCourses')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateForeignCourseRequest  $request
     * @param  \App\Models\ForeignCourse  $foreignCourse
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateForeignCourseRequest $request, int $id)
    {
        University::updateForeignCourses($request->validated(), $id);
        return redirect()->route('admin.foreign-courses.index');   
    }
}
