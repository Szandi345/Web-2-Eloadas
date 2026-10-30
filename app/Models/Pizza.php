<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
 protected $table = 'pizza';

    protected $primaryKey = 'pizzaid';

    protected $fillable = [
        'nev',
        'kategoriaid',
        'vegetarianus'
    ];
}
