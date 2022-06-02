<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parte_trabajo extends Model
{
    use HasFactory;

    protected $fillable = [
        'Cliente',
        'Fecha',
        'Descripcion',
        'Materiales',
        'Observaciones',
        'Adjuntos',
        'Horas_montaje',
        'Horas_taller',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
