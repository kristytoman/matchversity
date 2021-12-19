<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\HomeCourse;
use App\Models\ForeignCourse;
use App\Models\University;
use App\Http\Requests\SearchRequest;
use Illuminate\View\View;

class UniversityController extends Controller
{
    /**
     * Display a listing of the universities.
     *
     * @param SearchRequest $request
     * @return View
     */
    public function index(SearchRequest $request): View
    {
        // Save searching information.
        $validated = $request->validated();
        HomeCourse::setSession($validated);
        Country::setSession($validated);

        $universities = University::findResults();

        return view('universities.hunter', [
            'top3' => $universities->count() > 3 ? $universities->splice(0, 3) : null,
            'universities' => $universities,
        ]);
    }

    /**
     * Display the specified university.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        return view('universities.university', [
            'university' => University::getById($id),
            'courses' => ForeignCourse::getUniversityData($id)
        ]);
    }
}
