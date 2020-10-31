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

Route::get( '/', function () 
{
    return view( 'welcome' );
});

Route::get( 'matcher', function()
{
    echo "Vyhledavaci stranka";
});

Route::get( 'hunter', [ UniversityController::class, 'index' ] );

Route::get( 'uniprofil', [ UniversityController::class, 'index' ] );

Route::get( 'userprofil', [ MobilityController::class, 'index' ] );

Route::get( 'rating', [ MobilityController::class, 'index' ] );

Route::get( 'admin', [ AdminController::class, 'index' ] );

Route::get( 'contacts', function()
{
    echo "Kontakty";
});

Route::get( 'error', function()
{
    echo "Error stránka";
});