<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;

     protected $fillable = [
            'Nombre',
            'Email',
            'Seguridad_Social',
            'Telefono',
            'Direccion',
            'Categoria',
            'Cotizacion',
            'Antiguedad',
            'Cod_Contrato',
            'Precio_Horas',
            'Observaciones'
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
            'Dni',
        ];
}
