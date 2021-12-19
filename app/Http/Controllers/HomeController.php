<?php

namespace App\Http\Controllers;

use App\Models\ForeignCourse;
use App\Models\Mobility;
use App\Models\University;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return View
     */
    public function __invoke(): View
    {
        return view('welcome', [
            'countMobility' => Mobility::getCount(),
            'countUni' => University::getCount(),
            'countCourse' => ForeignCourse::getCount()
        ]);
    }
}
