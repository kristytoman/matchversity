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
    return view( 'universities.matcher' );
});

Route::resource( 'universities', MobilityController::class );

Route::resource( 'mobilities', MobilityController::class );

Route::get( 'admin',  function()
{
    return view( 'admin.index' );
});

Route::get( 'contacts', function()
{
    echo "Kontakty";
});

Route::get( 'error', function()
{
    echo "Error stránka";
});