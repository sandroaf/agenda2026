<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoContato extends Model
{
    //
    function contatos()
    {
        return $this->hasMany(Contato::class, 'tipo_contato_id');
    }
}
