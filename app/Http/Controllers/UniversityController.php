<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Http\Requests\SearchRequest;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Requests\SearchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(SearchRequest $request)
    {
        return view('universities.hunter', [
           'universities' => University::findResults($request->validated())
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
        return view('universities.university', [
            'university' => University::getById($id)
        ]);
    }
}
