<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeticionesTipoCambio extends Model
{
    use HasFactory;


    protected  $fillable  = [
        'numero_peticion',
        'fecha_peticion',
        'tc_compra',
        'tc_venta',
        'moneda_id'
    ];
}
