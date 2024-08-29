<?php

use App\Http\Controllers\ClientesC;
use App\Http\Controllers\CopiasC;
use App\Http\Controllers\Home;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PeliculasC;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
    // $pdf = Pdf::loadHTML('<h1>Hola WIII</h1>');
    // return $pdf ->stream();

});
Route::resource('pelicula', PeliculasC::class);
Route::resource('home', Home::class);
Route::resource('copias', CopiasC::class);
Route::resource('copias', CopiasC::class);
Route::resource('clientes', ClientesC::class);
Route::get('/Clientes/Pdf', [ClientesC::class, 'pdf'])->name('clientes.pdf');


