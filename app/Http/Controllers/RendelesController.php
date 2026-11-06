<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Rendeles;

class RendelesController extends Controller
{
    // Meglévő rendelések listázása
    public function read(){
        $rendelesek = DB::table('rendeles')
            ->join('pizza', 'rendeles.pizzaid', '=', 'pizza.pizzaid')
            ->join('kategoria', 'pizza.kategoriaid', '=', 'kategoria.kategoriaid')
            ->select(
                'rendeles.rendelesid',
                'rendeles.darab',
                'rendeles.felvetel',
                'rendeles.allapot',
                'pizza.nev as pizzanev',
                'kategoria.nev as kategorianev',
                'rendeles.egysegar')
            ->selectRaw(
                'COALESCE(rendeles.egysegar, kategoria.ar) as ar')
            ->where('rendeles.user_id', auth()->id())
            ->orderByDesc('rendeles.felvetel')
            ->get();

        return view('rendeles.index', compact('rendelesek'));
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
        // Beküldött adatok ellenőrzése
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

        // Pizza aktuális árának lekérdezése
        $pizza = DB::table('pizza')
            ->join('kategoria', 'pizza.kategoriaid', '=', 'kategoria.kategoriaid')
            ->select('kategoria.ar')
            ->where('pizza.pizzaid', $adatok['pizzaid'])
            ->first();

        // Ha a pizza időközben törlődött
        if (!$pizza) {
            return back()->withErrors([
                'pizzaid' => 'A kiválasztott pizza már nem elérhető!'
            ])->withInput();
        }

        // Rendelés mentése az egységárral együtt
        $rendelesId = DB::table('rendeles')->insertGetId([
            'pizzaid' => $adatok['pizzaid'],
            'darab' => $adatok['darab'],
            'user_id' => auth()->id(),
            'egysegar' => $pizza->ar,
            'felvetel' => now(),
            'kiszallitas' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ], 'rendelesid');

        // Átirányítás a visszaigazoló oldalra
        return redirect()->route('rendeles.show', $rendelesId);
    }

       // Leadott rendelés visszaigazolása
    public function show($id){
        // Rendelés lekérdezése
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
                'rendeles.egysegar',
                'kategoria.ar'
            )
            ->where('rendeles.rendelesid', $id)
            ->first();

        // Nem létező rendelés ellenőrzése
        if (!$rendeles) {
            abort(404, 'A rendelés nem található!');
        }

        // Jogosultság ellenőrzése
        if ((int) $rendeles->user_id !== (int) auth()->id()) {
            abort(403, 'Nincs jogosultságod megtekinteni ezt a rendelést!');
        }

        // Mentett ár használata, régi rendelésnél aktuális ár
        $rendeles->ar = $rendeles->egysegar ?? $rendeles->ar;

        // Végösszeg kiszámítása
        $vegosszeg = $rendeles->ar * $rendeles->darab;

        return view('rendeles.show', compact('rendeles', 'vegosszeg'));
    }
}