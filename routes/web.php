<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeCourseController;
use App\Http\Controllers\Admin\ForeignCourseController;
use App\Http\Controllers\Admin\MobilityController as AdminMobilityController;
use App\Http\Controllers\Admin\ReasonController;
use App\Http\Controllers\Admin\UniversityController as AdminUniversityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MobilityController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UniversityController;




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

Auth::routes(['register' => false]);

Route::get('/', HomeController::class);

Route::get('login', [LoginController::class, 'showAdmin'])
       ->name('admin.login');

Route::post('login', [LoginController::class, 'adminLogin']);

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function() {
    Route::get('/', [AdminMobilityController::class, 'index']);
    
    Route::resource('foreign-courses', ForeignCourseController::class);

    Route::resource('home-courses', HomeCourseController::class)
           ->only(['index', 'update']);
    
    Route::post('import', [AdminMobilityController::class, 'import'])
           ->name('mobilities.import');
    Route::resource('mobilities', AdminMobilityController::class)
           ->except(['create', 'edit', 'delete']);
    
    Route::resource('reasons', ReasonController::class)
           ->except(['show', 'edit', 'create']);

    Route::resource('universities', AdminUniversityController::class)
           ->only(['index', 'update', 'edit']);
});

Route::resource('mobilities', MobilityController::class)
       ->only(['index', 'show', 'edit', 'update']);

Route::get('search', SearchController::class);

Route::post('universities', [UniversityController::class, 'index']);
Route::resource('universities', UniversityController::class)
       ->only(['index', 'show']);