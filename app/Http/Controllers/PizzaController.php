<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
    public function read()
    {
        
      foreach (Pizza::all() as $pizza){
        echo $pizza->nev."<br>";
        echo $pizza->kategoriaid."<br>";
        echo $pizza->vegetarianus."<br>";
        echo $pizza."<br>";
      }
    }
}
