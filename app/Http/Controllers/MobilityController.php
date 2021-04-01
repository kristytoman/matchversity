<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMobilityRequest;
use App\Models\Mobility;
use App\Models\Reason;
use App\Models\User;
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
        return view('mobilities.get_mobilities', [
            'mobilities' => User::getStudentsMobilities('hash')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        return view('mobilities.show_mobility', [
            'mobility' => Mobility::findById($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
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
     * Update the specified resource in storage.
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
