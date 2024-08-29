<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeliculasM extends Model
{
    use HasFactory;
    protected $table='peliculas';
    protected $primaryKey = 'id_pelicula';
    protected $fillable = ['titulo','anio','critica','caratula'];
}
