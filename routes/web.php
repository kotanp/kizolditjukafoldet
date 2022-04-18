<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BejegyzesekController;
use App\Http\Controllers\TevekenysegController;
use App\Http\Controllers\OsztalyController;
use App\Http\Controllers\UserController;
//use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('tajkep');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/jovahagyas', function () {
        return view('admin');
    });
    
    Route::get('/reset', function () {
        return view('/reset');
    });
});


##BEJEGYZES
Route::get('/bejegyzesek', [BejegyzesekController::class, 'index']);
Route::get('/bejegyzesek/osztaly', [BejegyzesekController::class, 'expandOsztaly']);
Route::get('/bejegyzesek/expand', [BejegyzesekController::class, 'expand']);
Route::get('/bejegyzesek/sortbytev', [BejegyzesekController::class, 'sortByTevekenyseg']);
Route::get('/bejegyzesek/filterbyoszt', [BejegyzesekController::class, 'filterByOsztaly']);
Route::get('/bejegyzesek/filterbyoszt/{osztalyId}', [BejegyzesekController::class, 'filterByOsztalyId']);
Route::get('/bejegyzesek/listbyoszt/{osztalyId}', [BejegyzesekController::class, 'listByOsztaly']);
Route::get('/bejegyzes/{bejegyzesId}', [BejegyzesekController::class, 'show']);
Route::post('/bejegyzes', [BejegyzesekController::class, 'store'])->name('bejegyzes.post');

##TEVEKENYSEG
Route::get('/tevekenysegek', [TevekenysegController::class, 'index']);

##OSZTALY
Route::get('/osztalyok', [OsztalyController::class, 'index']);



##ADMIN
Route::middleware(['auth'])->group(function () {
    Route::get('/bejegyzesek/filterbytanar', [BejegyzesekController::class, 'filterByTanar']);
    Route::get('/bejegyzesek/groupbytev', [BejegyzesekController::class, 'groupByTevekenyseg']);
    Route::put('/bejegyzes/{bejegyzesId}', [BejegyzesekController::class, 'update']);
    Route::delete('/bejegyzes/{bejegyzesId}', [BejegyzesekController::class, 'destroy']);
    Route::get('/osztaly/tanar', [OsztalyController::class, 'loggedInOsztaly']);

});

Route::get('/bejegyzesek/elfogadott/{oszatlyId}/{teveknysegId}', [BejegyzesekController::class, 'elfogadottBejegyzesek']);