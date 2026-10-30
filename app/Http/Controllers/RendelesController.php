<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rendeles;

class RendelesController extends Controller
{
    public function read()
    {
        
      foreach (Rendeles::all() as $rendeles){
        echo $rendeles->pizzaid."<br>";
        echo $rendeles->darab."<br>";
        echo $rendeles->felvetel."<br>";
        echo $rendeles->kiszallitas."<br>";
        echo $rendeles."<br>";
      }
    }}
