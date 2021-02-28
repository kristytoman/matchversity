<?php

namespace App\Http\Controllers;

use DB;
use App\Models\University;
use App\Models\HomeCourse;
use App\Models\Mobility;
use App\Models\UnlinkReason;
use App\Http\Requests\StoreMobilityRequest;
use App\Http\Requests\UpdateMobilityRequest;
use App\Http\Requests\ImportMobilitiesRequest;
use Illuminate\Http\Request;
use SimpleXLSX;

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

    public function upload() 
    {
        return view('admin.index');
    }

    public function import(ImportMobilitiesRequest $request) 
    {
        $validated = $request->validated();
        if ($data = $this->getData($validated['file'])) {
            Pairing::importPairings($data);
        }
    }

    private function getData($file) 
    {
        if ( $data = SimpleXLSX::parse($file)) {
            $header = $rows = [];
            foreach ( $data->rows() as $index => $row ) {
                if ( $index === 0 ) {
                    if ($this->isRightHeader($row)) {
                        $header = $row;
                        continue;
                    }
                    return null;
                }
                $rows[] = array_combine( $header, $row );
            }
            return $rows;
        }
        return null;
    }

    private function isRightHeader($row) {
        return in_array(ImportColumns::STUDENT_ID) &&
               in_array(ImportColumns::FACULTY) &&
               in_array(ImportColumns::YEAR) &&
               in_array(ImportColumns::SEMESTER) &&
               in_array(ImportColumns::DEGREE) &&
               in_array(ImportColumns::START) &&
               in_array(ImportColumns::END) &&
               in_array(ImportColumns::UNIVERSITY) &&
               in_array(ImportColumns::CITY) &&
               in_array(ImportColumns::COUNTRY) &&
               in_array(ImportColumns::FIELD) &&
               in_array(ImportColumns::FOREIGN_COURSE) &&
               in_array(ImportColumns::HOME_COURSE) &&
               in_array(ImportColumns::PAIRING_TYPE);
    }   
}
