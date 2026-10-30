<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kategoria;

class KategoriaController extends Controller
{
    public function read()
    {
        
      foreach (Kategoria::all() as $kategoria){
        echo $kategoria->nev."<br>";
        echo $kategoria->ar."<br>";
        echo $kategoria."<br>";
      }
    }
}