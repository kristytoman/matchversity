<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMobilityRequest;
use App\Models\Mobility;
use App\Models\Reason;
use App\Models\User;

class MobilityController extends Controller
{
    /**
     * Display a listing of user's mobilities.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        return view('mobilities.get_mobilities', [
            'mobilities' => User::getStudentsMobilities('hash')
        ]);
    }

    /**
     * Show the form for editing the user's mobility.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
        return view('mobilities.rate_mobility', [
            'mobility' => Mobility::find($id),
            'reasons' => Reason::all()
        ]); 
    }

    /**
     * Update the specified mobility in storage.
     *
     * @param  App\Http\Requests\UpdateMobilityRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMobilityRequest $request, $id) 
    {
        $mobility = Mobility::find($id);
        $mobility->updateMobility($request->validated());
        return redirect()->route('mobilities.index');
    }
}
