<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\Auth2;
use App\Http\Controllers\KapcsolatController;
use App\Http\Controllers\UzenetController;
use App\Http\Controllers\DiagramController;
use App\Http\Controllers\PizzaCrudController;
use Illuminate\Http\Request;

Route::get('/', function () { return view('pizzamain'); });

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {return Inertia::render('dashboard');})->name('dashboard');
    Route::get('user', function () { return view('user'); })->name("user");
    Route::get('admin', 'App\Http\Controllers\AdminController@adminPage');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

Route::get('exercise1', function () { return view('view1'); });
Route::get('introduction', function () { return view('introduction'); });
Route::get('kategoriaread', 'App\Http\Controllers\KategoriaController@read');
Route::get('pizzaread', 'App\Http\Controllers\PizzaController@read');
Route::get('rendelesread', 'App\Http\Controllers\RendelesController@read');
Route::get('/kapcsolat', [KapcsolatController::class, 'index'])
    ->name('kapcsolat');
Route::post('/kapcsolat', [KapcsolatController::class, 'kuldes'])
    ->name('kapcsolat.kuldes');
Route::get('/uzenetek', [UzenetController::class, 'index'])
    ->middleware('auth')
    ->name('uzenetek');
Route::get('/diagram', [DiagramController::class, 'index'])
    ->name('diagram');

// CRUD - Adminisztrátori hozzáférés
Route::get('/crud', [PizzaCrudController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('crud.index');