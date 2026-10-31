<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

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
}