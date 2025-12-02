<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Disciplina extends Model
{
    //
    use HasFactory;

    protected $fillable=[
        'nombre_disciplina',
    ];


    public function deportistas()
    {
        return $this->hasMany(Deportista::class, 'fk_id_disciplina');
    }

}


