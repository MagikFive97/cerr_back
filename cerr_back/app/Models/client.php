<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;
    protected $fillable = [
        'Nombre',
        'Dni',
        'Email',
        'Razon_Social',
        'Telefono',
        'Direccion',
        'Cod_postal',
        'Localidad',
        'Provincia',
        'Observaciones',
        'Benefito',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];


}
