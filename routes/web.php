<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\MobilityController;
use App\Http\Controllers\AdminController;
use App\Models\Mobility;
use App\Models\University;
use App\Models\ForeignCourse;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'countMobility' => Mobility::getCount(),
        'countUni' => University::getCount(),
        'countCourse' => ForeignCourse::getCount()
    ]);
});


Route::get('search', function() {
    return view('matcher', [
        'geography' => json_decode(Storage::disk('local')->get('json/countries.json'), false)
    ]);
});

Route::resource('universities', UniversityController::class);

Route::post('import', [MobilityController::class, 'import'])
    ->name('import');

Route::post('save', [MobilityController::class, 'save'])
     ->name('save');

Route::get('admin', [MobilityController::class, 'upload']);

Route::resource('mobilities', MobilityController::class);

Route::get('contacts', function() {
    echo "Kontakty";
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
