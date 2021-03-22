<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeCourse;
use Illuminate\Http\Request;
use App\Http\Requests\GroupHomeCourseRequest;

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
            'courses' => HomeCourse::select()->orderBy('name')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeCourse  $homeCourse
     * @return \Illuminate\Http\Response
     */
    public function show(HomeCourse $homeCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeCourse  $homeCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeCourse $homeCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeCourse  $homeCourse
     * @return \Illuminate\Http\Response
     */
    public function update(GroupHomeCourseRequest $request, HomeCourse $homeCourse)
    {
        $validated = $request->validated();
        foreach ($validated['group'] as $key => $value) {
            $course = HomeCourse::find($key);
            $course->group = $value;
            $course->save();
        }
       return redirect()->route('admin.home-courses.index');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeCourse  $homeCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeCourse $homeCourse)
    {
        //
    }
}
