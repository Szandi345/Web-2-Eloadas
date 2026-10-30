<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rendeles extends Model
{
 protected $table = 'rendeles';

    protected $primaryKey = 'rendelesid';

    protected $fillable = [
        'pizzaid',
        'darab',
        'felvetel',
        'kiszallitas'
    ];
}
