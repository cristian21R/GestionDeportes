<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pais extends Model
{
    use HasFactory;
    protected $table = 'paises';


    protected $fillable = [
        'nombre_pais',
    ];

    public function paises()
    {
        return $this->hasMany(Deportista::class, 'fk_id_pais');
    }
}
