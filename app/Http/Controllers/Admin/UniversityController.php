<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUniversityProfileRequest;
use App\Models\University;

class UniversityController extends Controller
{
    /**
     * Display a listing of all universities.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.universities', [
            'universities'=> University::all()
        ]);
    }

    /**
     * Show the form for editing the specified univeristy.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function edit(University $university)
    {
        return view('admin.add_university', [
            'university' => $university,
            'universities' => University::all()
        ]);
    }        

    /**
     * Update the specified university in storage.
     *
     * @param  App\Http\Requests\AddUniversityProfileRequest  $request
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function update(AddUniversityProfileRequest $request, University $university)
    {
        $validated = $request->validated();

        // Try to connect university with an existing one.
        if ($validated['connect_university']) {
            University::connectProfiles($university->id, $validated['connect_university']);
        }
        else {
            University::updateProfile($university->id, $validated);
        }
        return redirect()->route('admin.universities.index');
    }
}
