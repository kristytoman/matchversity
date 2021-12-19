<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUniversityProfileRequest;
use App\Models\University;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UniversityController extends Controller
{
    /**
     * Display a listing of all universities.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.universities', [
            'universities' => University::all()
        ]);
    }

    /**
     * Show the form for editing the specified univeristy.
     *
     * @param University $university
     * @return View
     */
    public function edit(University $university): View
    {
        return view('admin.add_university', [
            'university' => $university,
            'universities' => University::all()
        ]);
    }

    /**
     * Update the specified university in storage.
     *
     * @param AddUniversityProfileRequest $request
     * @param University $university
     * @return RedirectResponse
     */
    public function update(AddUniversityProfileRequest $request, University $university): RedirectResponse
    {
        $validated = $request->validated();

        // Try to connect university with an existing one.
        if ($validated['connect_university']) {
            University::connectProfiles($university->id, $validated['connect_university']);
        } else {
            University::updateProfile($university->id, $validated);
        }
        return redirect()->route('admin.universities.index');
    }
}
