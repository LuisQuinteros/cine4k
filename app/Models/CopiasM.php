<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CopiasM extends Model
{
    use HasFactory;
    protected $table='copias';
    protected $primaryKey = 'n_copia';
    protected $fillable = ['estado','formato','precio_alquiler','id_pelicula'];
}
