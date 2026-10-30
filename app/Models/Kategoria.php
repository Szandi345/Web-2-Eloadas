<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategoria extends Model
{
    protected $table = 'kategoria';

    protected $primaryKey = 'kategoriaid';

    protected $fillable = [
        'nev',
        'ar',
    ];
}
