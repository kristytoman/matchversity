<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('fields/{type}/{id}', [ApiController::class, 'getFields'])->name('api.fields');

Route::get('courses/{id}/{rok}', [ApiController::class, 'getCourses'])->name('api.courses');

Route::post('countries', [ApiController::class, 'getCountries'])->name('api.countries');

Route::get('course/{unit}/{code}', [ApiController::class, 'getCourse'])->name('api.course');

