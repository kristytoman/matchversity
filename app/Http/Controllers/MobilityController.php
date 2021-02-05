<?php

namespace App\Http\Controllers;

use DB;
use App\Models\University;
use App\Models\HomeCourse;
use App\Models\Mobility;
use App\Models\UnlinkReason;
use App\Http\Requests\StoreMobilityRequest;
use App\Http\Requests\UpdateMobilityRequest;
use Illuminate\Http\Request;


class MobilityController extends Controller
{
    private $mobility;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'mobilities.get_mobilities',
            [
                'mobilities' => Mobility::all()
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
            'mobilities.add_mobility', 
            [
                'universities' => University::all(),
                'homeCourses' => HomeCourse::all(),
                'years' => $this->getLastTenYears()
            ]
        );
    }

    private function getLastTenYears()
    {
        return range(date('Y'), date('Y') - 10, -1);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreMobility  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMobilityRequest $request)
    {
        Mobility::saveMobility($request->validated());
        return redirect('mobilities');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mobility = Mobility::find($id);
        return view(
            'mobilities.show_mobility', 
            [
                'mobility' => $mobility,
                'duration' => $mobility->getDuration($id)
            ]
        );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobility = Mobility::find($id);
        return view(
            'mobilities.rate_mobility', 
            [
                'mobility' => $mobility,
                'duration' => $mobility->getDuration($id),
                'reasons' => UnlinkReason::all()
            ]
        ); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMobilityRequest $request, $id)
    {
        $mobility = Mobility::find($id);
        $mobility->updateMobility($request->validated());
        return redirect('mobilities');
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
