<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\KapcsolatController;
use App\Http\Controllers\UzenetController;
use App\Http\Controllers\DiagramController;
use App\Http\Controllers\PizzaCrudController;
use App\Http\Controllers\RendelesController;
use App\Http\Controllers\AdminRendelesController;

Route::get('/', function () { return view('pizzamain'); })->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');

    Route::get('user', function () {
        return view('user');
    })->name('user');
    
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

Route::get('exercise1', function () { return view('view1'); });
Route::get('introduction', function () { return view('introduction'); });
Route::get('kategoriaread', 'App\Http\Controllers\KategoriaController@read');
Route::get('pizzaread', 'App\Http\Controllers\PizzaController@read');
Route::get('/rendelesread', [RendelesController::class, 'read'])
    ->middleware('auth')
    ->name('rendeles.read');
Route::get('/kapcsolat', [KapcsolatController::class, 'index'])
    ->name('kapcsolat');
Route::post('/kapcsolat', [KapcsolatController::class, 'kuldes'])
    ->name('kapcsolat.kuldes');
Route::get('/uzenetek', [UzenetController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('uzenetek');
Route::get('/diagram', [DiagramController::class, 'index'])
    ->name('diagram');
    
// Rendelési funkciók bejelentkezett felhasználóknak
Route::middleware(['auth'])->group(function () {

    // Rendelési űrlap megjelenítése
    Route::get('/rendeles/create', [RendelesController::class, 'create'])
        ->name('rendeles.create');

    // Rendelés mentése
    Route::post('/rendeles', [RendelesController::class, 'store'])
        ->name('rendeles.store');

    // Leadott rendelés visszaigazolása
    Route::get('/rendeles/{id}', [RendelesController::class, 'show'])
    ->whereNumber('id')
    ->name('rendeles.show');
    });

// CRUD - Adminisztrátori hozzáférés
Route::middleware(['auth', 'admin'])->group(function () {

    // Pizzák listázása
    Route::get('/crud', [PizzaCrudController::class, 'index'])
        ->name('crud.index');

    // Új pizza hozzáadása - űrlap
    Route::get('/crud/create', [PizzaCrudController::class, 'create'])
        ->name('crud.create');
        
    // Új pizza mentése
    Route::post('/crud', [PizzaCrudController::class, 'store'])
        ->name('crud.store');

    // Meglévő pizza szerkesztése
    Route::get('/crud/{id}/edit', [PizzaCrudController::class, 'edit'])
        ->whereNumber('id')
        ->name('crud.edit');

    // Pizza módosításának mentése
    Route::put('/crud/{id}', [PizzaCrudController::class, 'update'])
        ->whereNumber('id')
        ->name('crud.update');

    // Pizza törlése
    Route::delete('/crud/{id}', [PizzaCrudController::class, 'destroy'])
        ->whereNumber('id')
        ->name('crud.destroy');
    
    // Admin rendeléskezelés
    Route::get('/admin/rendelesek', [AdminRendelesController::class, 'index'])
        ->name('admin.rendelesek');
});