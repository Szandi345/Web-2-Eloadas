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
    // Új rendelés mentése
    public function store(Request $request){
        // Adatok ellenőrzése
        $adatok = $request->validate([
            'pizzaid' => 'required|integer|exists:pizza,pizzaid',
            'darab' => 'required|integer|min:1|max:100',
        ], [
            'pizzaid.required' => 'Válassz egy pizzát!',
            'pizzaid.exists' => 'A kiválasztott pizza nem létezik!',
            'darab.required' => 'Add meg a darabszámot!',
            'darab.integer' => 'A darabszám egész szám legyen!',
            'darab.min' => 'Legalább 1 pizzát kell rendelned!',
            'darab.max' => 'Egyszerre legfeljebb 100 pizzát rendelhetsz!',
        ]);

        // Rendelés mentése az adatbázisba
        $rendelesId = DB::table('rendeles')->insertGetId([
            'pizzaid' => $adatok['pizzaid'],
            'darab' => $adatok['darab'],
            'user_id' => auth()->id(),
            'felvetel' => now(),
            'kiszallitas' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ], 'rendelesid');

        // Átirányítás a visszaigazoló oldalra
        return redirect()->route('rendeles.show', $rendelesId);}

        // Leadott rendelés visszaigazolása
    public function show($id){
        // Rendelés lekérdezése a pizza és a kategória adataival
        $rendeles = DB::table('rendeles')
            ->join('pizza', 'rendeles.pizzaid', '=', 'pizza.pizzaid')
            ->join('kategoria', 'pizza.kategoriaid', '=', 'kategoria.kategoriaid')
            ->select(
                'rendeles.rendelesid',
                'rendeles.user_id',
                'rendeles.darab',
                'rendeles.felvetel',
                'pizza.nev as pizzanev',
                'kategoria.nev as kategorianev',
                'kategoria.ar'
            )
            ->where('rendeles.rendelesid', $id)
            ->first();

        // Ha a rendelés nem létezik
        if (!$rendeles) {
            abort(404, 'A keresett rendelés nem található!');
        }

        // Csak a rendelést leadó felhasználó láthatja
        if ((int) $rendeles->user_id !== (int) auth()->id()) {
            abort(403, 'Nincs jogosultságod megtekinteni ezt a rendelést!');
        }

        // Végösszeg kiszámítása
        $vegosszeg = $rendeles->ar * $rendeles->darab;

        // Visszaigazoló oldal megjelenítése
        return view('rendeles.show', compact('rendeles', 'vegosszeg'));}
}