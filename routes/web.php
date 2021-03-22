<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MobilityController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\Admin\UniversityController as AdminUniversityController;
use App\Http\Controllers\Admin\MobilityController as AdminMobilityController;
use App\Http\Controllers\Admin\ForeignCourseController;
use App\Http\Controllers\Admin\HomeCourseController;
use App\Http\Controllers\Admin\ReasonController;




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

Route::get('/', HomeController::class);

Route::prefix('admin')->name('admin.')->group(function(){
    Route::post('import', [AdminMobilityController::class, 'import'])->name('import');
    Route::get('/', [AdminMobilityController::class, 'index']);
    Route::resource('foreign-courses', ForeignCourseController::class);
    Route::resource('home-courses', HomeCourseController::class);
    Route::resource('mobilities', AdminMobilityController::class);
    Route::resource('universities', AdminUniversityController::class);
    Route::resource('reasons', ReasonController::class)->except(['show', 'edit', 'create']);
});

Route::get('search', SearchController::class);

Route::resource('universities', UniversityController::class)
    ->only(['index', 'show']);

Route::resource('mobilities', MobilityController::class)
    ->except(['create', 'destroy']);

Route::get('contacts', function() {
    echo "Kontakty";
});

Auth::routes();