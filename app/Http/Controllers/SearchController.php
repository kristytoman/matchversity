<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return View
     * @throws FileNotFoundException
     */
    public function __invoke(): View
    {
        return view('matcher', [
            'geography' => Storage::disk('local')->get('json/countries.json')
        ]);
    }
}
