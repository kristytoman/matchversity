<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupHomeCourseRequest;
use App\Models\HomeCourse;
use Illuminate\Http\Request;

class HomeCourseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
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
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\GroupHomeCourseRequest  $request
     * @param  \App\Models\HomeCourse  $homeCourse
     * @return \Illuminate\Http\Response
     */
    public function update(GroupHomeCourseRequest $request, HomeCourse $homeCourse)
    {
        HomeCourse::changeGroups($request->validated());
        return redirect()->route('admin.home-courses.index');   
    }
}
