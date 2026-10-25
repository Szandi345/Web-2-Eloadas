<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pizza')->insert([
            ['nev' => 'Áfonyás', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Babos', 'kategoriaid' => 4, 'vegetarianus' => 0],
            ['nev' => 'Barbecue chicken', 'kategoriaid' => 4, 'vegetarianus' => 0],
            ['nev' => 'Betyáros', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Caribi', 'kategoriaid' => 1, 'vegetarianus' => 0],
            ['nev' => 'Country', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Csabesz', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Csupa sajt', 'kategoriaid' => 4, 'vegetarianus' => 1],
            ['nev' => 'Erdő kapitánya', 'kategoriaid' => 1, 'vegetarianus' => 0],
            ['nev' => 'Erős János', 'kategoriaid' => 4, 'vegetarianus' => 0],
            ['nev' => 'Excellent', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Főnök kedvence', 'kategoriaid' => 4, 'vegetarianus' => 0],
            ['nev' => 'Francia', 'kategoriaid' => 2, 'vegetarianus' => 0],
            ['nev' => 'Frankfurti', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Füstös', 'kategoriaid' => 4, 'vegetarianus' => 0],
            ['nev' => 'Gino', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Gombás', 'kategoriaid' => 1, 'vegetarianus' => 1],
            ['nev' => 'Góré', 'kategoriaid' => 4, 'vegetarianus' => 0],
            ['nev' => 'Görög', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Gyros pizza', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'HamAndEggs', 'kategoriaid' => 4, 'vegetarianus' => 0],
            ['nev' => 'Hamm', 'kategoriaid' => 4, 'vegetarianus' => 0],
            ['nev' => 'Hawaii', 'kategoriaid' => 2, 'vegetarianus' => 0],
            ['nev' => 'Hellas', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Hercegnő', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Ilike', 'kategoriaid' => 4, 'vegetarianus' => 0],
            ['nev' => 'Ínyenc', 'kategoriaid' => 4, 'vegetarianus' => 0],
            ['nev' => 'Jázmin álma', 'kategoriaid' => 4, 'vegetarianus' => 0],
            ['nev' => 'Jobbágy', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Juhtúrós', 'kategoriaid' => 4, 'vegetarianus' => 0],
            ['nev' => 'Kagylós', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Kétszínű', 'kategoriaid' => 4, 'vegetarianus' => 0],
            ['nev' => 'Kiadós', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Király pizza', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Kívánság', 'kategoriaid' => 4, 'vegetarianus' => 1],
            ['nev' => 'Kolbászos', 'kategoriaid' => 1, 'vegetarianus' => 0],
            ['nev' => 'Lagúna', 'kategoriaid' => 3, 'vegetarianus' => 1],
            ['nev' => 'Lecsó', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Maffiózó', 'kategoriaid' => 4, 'vegetarianus' => 0],
            ['nev' => 'Magvas', 'kategoriaid' => 3, 'vegetarianus' => 1],
            ['nev' => 'Magyaros', 'kategoriaid' => 4, 'vegetarianus' => 0],
            ['nev' => 'Máj Fair Lady', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Mamma fia', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Mexikói', 'kategoriaid' => 2, 'vegetarianus' => 0],
            ['nev' => 'Mixi', 'kategoriaid' => 2, 'vegetarianus' => 1],
            ['nev' => 'Nikó', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Nordic', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Nyuszó-Muszó', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Pacalos', 'kategoriaid' => 4, 'vegetarianus' => 0],
            ['nev' => 'Pástétomos', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Pásztor', 'kategoriaid' => 4, 'vegetarianus' => 0],
            ['nev' => 'Pipis', 'kategoriaid' => 4, 'vegetarianus' => 0],
            ['nev' => 'Popey', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Quattro', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Ráki', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Rettenetes magyar', 'kategoriaid' => 4, 'vegetarianus' => 0],
            ['nev' => 'Röfi', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Sajtos', 'kategoriaid' => 1, 'vegetarianus' => 1],
            ['nev' => 'So-ku', 'kategoriaid' => 1, 'vegetarianus' => 0],
            ['nev' => 'Son-go-ku', 'kategoriaid' => 2, 'vegetarianus' => 1],
            ['nev' => 'Sonkás', 'kategoriaid' => 1, 'vegetarianus' => 0],
            ['nev' => 'Spanyol', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Spencer', 'kategoriaid' => 2, 'vegetarianus' => 0],
            ['nev' => 'Szalámis', 'kategoriaid' => 1, 'vegetarianus' => 0],
            ['nev' => 'Szardíniás', 'kategoriaid' => 4, 'vegetarianus' => 0],
            ['nev' => 'Szerzetes', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Szőke kapitány', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Tenger gyümölcsei', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Tonhalas', 'kategoriaid' => 4, 'vegetarianus' => 0],
            ['nev' => 'Törperős', 'kategoriaid' => 4, 'vegetarianus' => 0],
            ['nev' => 'Tündi kedvence', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Tüzes halál', 'kategoriaid' => 3, 'vegetarianus' => 0],
            ['nev' => 'Vega', 'kategoriaid' => 4, 'vegetarianus' => 1],
            ['nev' => 'Zöldike', 'kategoriaid' => 2, 'vegetarianus' => 1],
        ]);
    }
}
