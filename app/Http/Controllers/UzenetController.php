<?php

namespace App\Http\Controllers;

use App\Models\Uzenet;

class UzenetController extends Controller
{
    public function index()
    {
        // Üzenetek lekérése az adatbázisból
        // A legújabb üzenet jelenjen meg legfelül
        $uzenetek = Uzenet::orderBy('created_at', 'desc')->get();

        // Üzenetek átadása a Blade nézetnek
        return view('uzenetek', compact('uzenetek'));
    }
}