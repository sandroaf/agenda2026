<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    //
    function tipoContato()
    {
        return $this->belongsTo(TipoContato::class, 'tipo_contato_id');
    }
}

