<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class libro extends Model
{
    protected $fillable = ['nombre', 'resumen', 'npagina','edicion','autor','precio'];
}
