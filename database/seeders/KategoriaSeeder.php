<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class KategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		DB::table('kategoria')->insert(
			['nev' => 'apród',
			 'ar' => 850]
		);

		DB::table('kategoria')->insert(
			['nev' => 'főnemes',
			 'ar' => 950]
		);

		DB::table('kategoria')->insert(
			['nev' => 'király',
			 'ar' => 1250]
		);

		DB::table('kategoria')->insert(
			['nev' => 'lovag',
			 'ar' => 1150]
		);
    }
}
