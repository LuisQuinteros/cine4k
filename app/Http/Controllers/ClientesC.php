<?php

namespace App\Http\Controllers;

use App\Models\ClientesM;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ClientesC extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = ClientesM::all();
    return view('Clientes.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ci' => 'required|string|max:10',
            'nombre' => 'required|string|max:50',
            'apellido1' => 'required|string|max:50',
            'apellido2' => 'nullable|string|max:50',
            'direccion' => 'nullable|string|max:100',
            'email' => 'required|email|unique:clientes,email',
        ]);
        ClientesM::create($validatedData);
        return redirect()->route('clientes.index')->with('save', 'Se guardo correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientesM $cliente)
    {
        return response()->json($cliente);
    }

    /**
     * Update the specified resource in storage.
     */
    // app/Http/Controllers/ClienteController.php
// app/Http/Controllers/ClienteController.php
    public function update(Request $request, $cod_cliente)
    {
        // Buscar el cliente por su clave primaria
        $cliente = ClientesM::where('cod_cliente', $cod_cliente)->firstOrFail();

        // Actualizar los datos del cliente sin validación
        $cliente->update($request->all());

        // Redirigir o devolver una respuesta según sea necesario
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = ClientesM::findOrFail($id);
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado con éxito.');
    }
    public function pdf()
    {
        $items = ClientesM::all();
        $pdf=Pdf::loadView('Clientes.pdf',compact('items'));
        return $pdf->stream();
    }
}
