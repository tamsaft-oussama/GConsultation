<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\HistoriqueController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('/user',UserController::class)->only(['index', 'destroy']);
    Route::resource('/client',ClientController::class)->only(['index', 'store']);
    Route::post('/client-search',[ClientController::class,'search'])->name('client.search');
    Route::post('/reclamation/{reclamation}',[ReclamationController::class,'addReclamation'])->name('addReclamation');
    Route::resource('/reclamation',ReclamationController::class)->except(['create', 'show','destroy','update','edit']);
    Route::resource('/historique',HistoriqueController::class)->only(['index']);
});

