<?php

namespace App\Http\Controllers;

use App\Models\ForeignCourse;
use App\Models\Mobility;
use App\Models\University;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('welcome', [
            'countMobility' => Mobility::getCount(),
            'countUni' => University::getCount(),
            'countCourse' => ForeignCourse::getCount()
        ]);
    }
}
