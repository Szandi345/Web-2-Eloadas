<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class PizzaCrudController extends Controller
{
    public function index()
    {
        $pizzak = DB::table('pizza')
            ->join('kategoria', 'pizza.kategoriaid', '=', 'kategoria.kategoriaid')
            ->select(
                'pizza.pizzaid',
                'pizza.nev',
                'kategoria.nev as kategorianev',
                'pizza.vegetarianus'
            )
            ->orderBy('pizza.pizzaid')
            ->get();

        return view('crud.index', compact('pizzak'));
    }
    public function create(){
    
        $kategoriak = DB::table('kategoria')
        ->orderBy('nev')
        ->get();

        return view('crud.create', compact('kategoriak'));
    }
    public function store(Request $request){
    // Beérkező adatok ellenőrzése
    $adatok = $request->validate([
        'nev' => 'required|string|max:255',
        'kategoriaid' => 'required|integer|exists:kategoria,kategoriaid',
        'vegetarianus' => 'required|boolean',
    ], [
        'nev.required' => 'A pizza nevét kötelező megadni!',
        'kategoriaid.required' => 'Válassz kategóriát!',
        'kategoriaid.exists' => 'A kiválasztott kategória nem létezik!',
        'vegetarianus.required' => 'Add meg, hogy vegetáriánus-e a pizza!',
    ]);

    // Új pizza beszúrása az adatbázisba
    DB::table('pizza')->insert([
        'nev' => $adatok['nev'],
        'kategoriaid' => $adatok['kategoriaid'],
        'vegetarianus' => $adatok['vegetarianus'],
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Visszairányítás a CRUD-listához
    return redirect()
        ->route('crud.index')
        ->with('success', 'Az új pizza sikeresen hozzáadva!');}
}