<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () 
{
    return view('welcome');
});

Route::get('matcher', function()
{
    echo "Vyhledavaci stranka";
});

Route::get('hunter', function()
{
    echo "Zobrazovani vysledku";
});

Route::get('uniprofil', function()
{
    echo "Profil univerzity";
});

Route::get('userprofil', function()
{
    echo "Profil studenta";
});

Route::get('rating', function()
{
    echo "Hodnoceni vyjezdu";
});

Route::get('admin',function()
{
    echo "Admin page";
});

Route::get('contacts', function()
{
    echo "Kontakty";
});

Route::get('error', function()
{
    echo "Error stránka";
});