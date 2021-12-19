<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateForeignCourseRequest;
use App\Models\University;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ForeignCourseController extends Controller
{
    /**
     * Display a listing of foreign courses grouped by university.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.foreign_courses', [
            'universities' => University::with('foreignCourses')->paginate(1)
        ]);
    }

    /**
     * Update courses of the university.
     *
     * @param UpdateForeignCourseRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateForeignCourseRequest $request, int $id): RedirectResponse
    {
        University::updateForeignCourses($request->validated(), $id);
        return back();
    }
}
