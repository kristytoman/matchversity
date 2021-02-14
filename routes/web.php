<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\MobilityController;
use App\Http\Controllers\AdminController;

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
    return view('welcome');
});

Route::get('matcher', function() {
    return view('matcher');
});

Route::resource('universities', UniversityController::class);

Route::post('import', [MobilityController::class, 'import'])
    ->name('import');

Route::get('admin', [MobilityController::class, 'upload']);

Route::resource('mobilities', MobilityController::class);

Route::get('contacts', function() {
    echo "Kontakty";
});