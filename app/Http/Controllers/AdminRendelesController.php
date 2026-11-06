<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AdminRendelesController extends Controller
{
    // Összes rendelés megjelenítése az admin számára
    public function index()
    {
        $rendelesek = DB::table('rendeles')
            ->join('users', 'rendeles.user_id', '=', 'users.id')
            ->join('pizza', 'rendeles.pizzaid', '=', 'pizza.pizzaid')
            ->join('kategoria', 'pizza.kategoriaid', '=', 'kategoria.kategoriaid')
            ->select(
                'rendeles.rendelesid',
                'rendeles.darab',
                'rendeles.felvetel',
                'rendeles.kiszallitas',
                'rendeles.allapot',
                'users.name as felhasznalo',
                'pizza.nev as pizzanev',
                'kategoria.nev as kategorianev'
            )
            ->selectRaw(
                'COALESCE(rendeles.egysegar, kategoria.ar) as ar'
            )
            ->orderByDesc('rendeles.felvetel')
            ->get();

        return view('admin.rendeles.index', compact('rendelesek'));
    }
}