<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uzenet;

class KapcsolatController extends Controller
{
    // Kapcsolat oldal megjelenítése
    public function index()
    {
        return view('kapcsolat');
    }

    // Űrlap feldolgozása
    public function kuldes(Request $request)
    {
        // Szerveroldali ellenőrzés
        $adatok = $request->validate([
            'nev' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'targy' => 'required|string|max:200',
            'uzenet' => 'required|string|min:10|max:2000',
        ], [
            'nev.required' => 'A név megadása kötelező!',
            'email.required' => 'Az e-mail cím megadása kötelező!',
            'email.email' => 'Érvénytelen e-mail cím!',
            'targy.required' => 'A tárgy megadása kötelező!',
            'uzenet.required' => 'Az üzenet megadása kötelező!',
            'uzenet.min' => 'Az üzenet legalább 10 karakter legyen!',
        ]);

        // Üzenet mentése
        Uzenet::create($adatok);

        return redirect()
            ->route('kapcsolat')
            ->with('siker', 'Az üzenetet sikeresen elküldted!');
    }
}