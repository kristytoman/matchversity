<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUniversityProfileRequest;
use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
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
     * Display the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function show(University $university)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
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
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\AddUniversityProfileRequest  $request
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function update(AddUniversityProfileRequest $request, University $university)
    {
        $validated = $request->validated();
        if ($validated['connect_university']) {
            University::connectProfiles($university->id, $validated['connect_university']);
        }
        else {
            University::updateProfile($university->id, $validated);
        }
        return redirect()->route('admin.universities.index');
    }
}
