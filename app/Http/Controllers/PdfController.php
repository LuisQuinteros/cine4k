<?php

namespace App\Http\Controllers;

use App\Models\ClientesM;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generarPdf()
    {
        $items = ClientesM::all();
        $pdf=Pdf::loadView('Clientes.pdf',compact('items'));
        return $pdf->stream();
    }
}
