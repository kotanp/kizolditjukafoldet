<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BejegyzesekController;
use App\Http\Controllers\TevekenysegController;
use App\Http\Controllers\OsztalyController;
use App\Http\Controllers\UserController;

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

Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/reset', function () {
    return view('/reset');
})->middleware(['auth']);


##BEJEGYZES
Route::get('/bejegyzesek', [BejegyzesekController::class, 'index']);
Route::get('/bejegyzesek/tanar', [BejegyzesekController::class, 'userBejegyzes']);
Route::get('/bejegyzesek/osztaly', [BejegyzesekController::class, 'expandOsztaly']);
Route::get('/bejegyzesek/expand', [BejegyzesekController::class, 'expand']);
Route::get('/bejegyzesek/sortbytev', [BejegyzesekController::class, 'sortByTevekenyseg']);
Route::get('/bejegyzesek/filterbyoszt', [BejegyzesekController::class, 'filterByOsztaly']);
Route::get('/bejegyzesek/filterbyoszt/{osztalyId}', [BejegyzesekController::class, 'filterByOsztalyId']);
Route::get('/bejegyzes/{bejegyzesId}', [BejegyzesekController::class, 'show']);
Route::put('/bejegyzes/{bejegyzesId}', [BejegyzesekController::class, 'update']);
Route::post('/bejegyzes', [BejegyzesekController::class, 'store']);
Route::delete('/bejegyzes/{bejegyzesId}', [BejegyzesekController::class, 'destroy']);

##TEVEKENYSEG
Route::get('/tevekenysegek', [TevekenysegController::class, 'index']);
Route::get('/tevekenyseg/{tevekenysegId}', [TevekenysegController::class, 'show']);
Route::put('/tevekenyseg/{tevekenysegId}', [TevekenysegController::class, 'update']);
Route::post('/tevekenyseg', [TevekenysegController::class, 'store']);
Route::delete('/tevekenyseg/{tevekenysegId}', [TevekenysegController::class, 'destroy']);

##OSZTALY
Route::get('/osztalyok', [OsztalyController::class, 'index']);
Route::get('/osztaly/{osztalyId}', [OsztalyController::class, 'show']);
Route::put('/osztaly/{osztalyId}', [OsztalyController::class, 'update']);
Route::post('/osztaly', [OsztalyController::class, 'store']);
Route::delete('/osztaly/{osztalyId}', [OsztalyController::class, 'destroy']);

##USER
Route::get('/userek', [UserController::class, 'index']);
Route::get('/user/{userId}', [UserController::class, 'show']);
Route::put('/user/{userId}', [UserController::class, 'update']);
Route::post('/user', [UserController::class, 'store']);
Route::delete('/user/{userId}', [UserController::class, 'destroy']);