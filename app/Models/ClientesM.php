<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientesM extends Model
{
    use HasFactory;
    protected $table='clientes';
    protected $primaryKey = 'cod_cliente';
    protected $fillable = ['ci','nombre','apellido1','apellido2','direccion','email'];
}
