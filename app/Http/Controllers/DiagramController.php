<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DiagramController extends Controller
{
    public function index()
    {
        // Pizzák számának lekérése kategóriánként
        $adatok = DB::table('kategoria')
            ->leftJoin('pizza', 'kategoria.kategoriaid', '=', 'pizza.kategoriaid')
            ->select(
                'kategoria.nev',
                DB::raw('COUNT(pizza.pizzaid) as darab')
            )
            ->groupBy('kategoria.kategoriaid', 'kategoria.nev')
            ->orderBy('kategoria.nev')
            ->get();

        // Kategórianevek kigyűjtése
        $kategoriak = $adatok->pluck('nev');

        // Pizzák darabszámának kigyűjtése
        $darabszamok = $adatok->pluck('darab');

        // Adatok átadása a diagram nézetnek
        return view('diagram', compact('kategoriak', 'darabszamok'));
    }
}