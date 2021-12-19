<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupHomeCourseRequest;
use App\Models\HomeCourse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HomeCourseController extends Controller
{
    /**
     * Display a listing of home courses ordered by name.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.home_courses', [
            'courses' => HomeCourse::allOrderedByName()
        ]);
    }

    /**
     * Update courses group.
     *
     * @param GroupHomeCourseRequest $request
     * @param HomeCourse $homeCourse
     * @return RedirectResponse
     */
    public function update(GroupHomeCourseRequest $request, HomeCourse $homeCourse): RedirectResponse
    {
        HomeCourse::changeGroups($request->validated());
        return back();
    }
}
