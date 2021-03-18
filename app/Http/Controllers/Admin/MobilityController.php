<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImportMobilitiesRequest;
use App\Http\Requests\StoreMobilitiesRequest;
use App\Models\Mobility;
use App\Models\Validation\FileValidator;
use App\Models\Validation\MobilityValidator;
use Illuminate\Http\Request;

class MobilityController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'mobilities.get_mobilities', [
                'mobilities' => Mobility::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ImportMobilitiesRequest $request)
    {
        $validated = $request->validated();
        $fileValidator = new FileValidator;
        if ($mobilities = $fileValidator->getData($validated['file'])) {
            Mobility::import($mobilities);
        }
        if ($fileValidator->toCheck) {
            return view('admin.data_check', [
                'count' => $fileValidator->getCount(),
                'mobilities' => $fileValidator->toCheck
            ]);
        }
        else {
            return redirect('mobilities');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMobilitiesRequest $request)
    {
        Mobility::import(MobilityValidator::fromForm($request->validated()));
        return redirect('mobilities');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mobility  $mobility
     * @return \Illuminate\Http\Response
     */
    public function show(Mobility $mobility)
    {
        // delete?
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mobility  $mobility
     * @return \Illuminate\Http\Response
     */
    public function edit(Mobility $mobility)
    {
        // delete?
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mobility  $mobility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mobility $mobility)
    {
        // delete?
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mobility  $mobility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mobility $mobility)
    {
        // delete?
    }
}
