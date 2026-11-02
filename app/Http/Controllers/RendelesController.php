<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Rendeles;

class RendelesController extends Controller
{
    // Meglévő rendelések listázása
    public function read()
    {
        foreach (Rendeles::all() as $rendeles) {
            echo $rendeles->pizzaid . "<br>";
            echo $rendeles->darab . "<br>";
            echo $rendeles->felvetel . "<br>";
            echo $rendeles->kiszallitas . "<br>";
            echo $rendeles . "<br>";
        }
    }

    // Új rendelés űrlapjának megjelenítése
    public function create()
    {
        // Pizzák lekérdezése kategóriával és árral
        $pizzak = DB::table('pizza')
            ->join(
                'kategoria',
                'pizza.kategoriaid',
                '=',
                'kategoria.kategoriaid'
            )
            ->select(
                'pizza.pizzaid',
                'pizza.nev',
                'kategoria.nev as kategorianev',
                'kategoria.ar'
            )
            ->orderBy('pizza.nev')
            ->get();

        // Rendelési űrlap megjelenítése
        return view('rendeles.create', compact('pizzak'));
    }
}