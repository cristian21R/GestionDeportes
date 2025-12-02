<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Deportista extends Model
{
    //
    protected $fillable = [

        'nombre_deportista',
        'fk_id_pais',
        'fk_id_disciplina',
        'nacimiento_deportista',
        'estatura_deportista',
        'peso_deportista',
    ];
        public function pais()
    {
        return $this->belongsTo(Pais::class, 'fk_id_pais');
    }

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class, 'fk_id_disciplina');
    }

}
