<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('matcher', [
            'geography' => json_decode(Storage::disk('local')->get('json/countries.json'), false)
        ]);
    }
}
