<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\HomeCourse;
use App\Models\ForeignCourse;
use App\Models\Pairing;
use App\Models\Location;
use App\Models\Mobility;
use App\Http\Requests\StoreMobility;
use Illuminate\Http\Request;


class MobilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
                        'mobilities.getMobilities',
                        [
                            'mobilities' => Mobility::with('university.location')
                                                    ->with('pairings.foreignCourse')->get()
                        ]
                    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
                        'mobilities.addMobility', 
                        [
                            'universities' => University::with('location')->get(),
                            'homeCourses' => HomeCourse::all(),
                            'years' => range(date('Y'), date('Y') -10, -1)
                        ]
                    );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreMobility  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMobility $request)
    {
        $validated = $request->validated();
        $mobility = new Mobility;
        $mobility->student = "test";    // change when connected to system
        $mobility->university()->associate(University::GetUniversity($validated));
        $mobility->save();
        Pairing::SavePairings($mobility, $validated['semester'], $validated['pairing']);
        return view(
                        'mobilities.getMobilities',
                        [
                            'mobilities' => Mobility::with('university.location')
                                                    ->with('pairings.foreignCourse')->get()
                        ]
                    );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
