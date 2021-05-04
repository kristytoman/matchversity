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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.mobilities', [
                'mobilities' => Mobility::paginate(30)
            ]
        );
    }

    /**
     * Import data from the resource file.
     *
     * @param  App\Http\Requests\ImportMobilitiesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function import(ImportMobilitiesRequest $request)
    {
        $fileValidator = new FileValidator;
        $validated = $request->validated();
        if (!($mobilities = ($fileValidator->getData($validated['file'])))) {
            return back()->withErrors(['Wrong file', 'The file has too many errors to be parsed.']);
        }

        Mobility::import($mobilities);
        
        if ($fileValidator->toCheck) {
            return view('admin.data_check', [
                'count' => $fileValidator->getCount(),
                'mobilities' => $fileValidator->toCheck
            ]);
        }
        else {
            return redirect()->route('admin.mobilities.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreMobilitiesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMobilitiesRequest $request)
    {
        $fileValidator = new FileValidator;
        Mobility::import($fileValidator->revalidate($request->validated()));
        if ($fileValidator->toCheck) {
            return view('admin.data_check', [
                'count' => $fileValidator->getCount(),
                'mobilities' => $fileValidator->toCheck
            ]);
        }
        else {
            return redirect()->route('admin.mobilities.index');
        }
        return redirect()->route('admin.mobilities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mobility  $mobility
     * @return \Illuminate\Http\Response
     */
    public function show(Mobility $mobility)
    {
        // 
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
        //
    }
}
