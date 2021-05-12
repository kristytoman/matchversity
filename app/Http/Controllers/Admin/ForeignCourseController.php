<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateForeignCourseRequest;
use App\Models\University;

class ForeignCourseController extends Controller
{
    /**
     * Display a listing of foreign courses grouped by university.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.foreign_courses', [
            'universities' => University::with('foreignCourses')->paginate(1)
        ]);
    }

    /**
     * Update courses of the university.
     *
     * @param  UpdateForeignCourseRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateForeignCourseRequest $request, int $id)
    {
        University::updateForeignCourses($request->validated(), $id);
        return back();   
    }
}
