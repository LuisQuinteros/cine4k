<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Models\PeliculasM;
use Illuminate\Http\Request;

class PeliculasC extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        $items = PeliculasM::where('titulo', 'LIKE', "%{$query}%")
        ->orWhere('anio', 'LIKE', "%{$query}%")
        ->orWhere('critica', 'LIKE', "%{$query}%")
        ->get();
        return view('Peliculas.index',  compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'titulo' => 'required|string|max:255',
            'anio' => 'required|integer',
            'critica' => 'required|string',
            'caratula' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $caratulaUrl = null;
    
        if ($request->hasFile('caratula')) {
            $caratulaPath = $request->file('caratula')->store('caratulas', 'public');
            $caratulaUrl = Storage::url($caratulaPath);
        }
        
    
        try {
            // Crear un nuevo registro en la base de datos
            PeliculasM::create([
                'titulo' => $request->input('titulo'),
                'anio' => $request->input('anio'),
                'critica' => $request->input('critica'),
                'caratula' => $caratulaUrl,
            ]);
    
            // Redirigir con mensaje de éxito
            return back()->with('success', 'Película creada exitosamente.');
        } catch (\Exception $e) {
            // Si ocurre un error al guardar en la base de datos
            return back()->withErrors(['database' => 'Error al guardar la película.'])->withInput();
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pelicula = PeliculasM::find($id);
        if ($pelicula) {
            // Usa asset() para generar la URL completa de la imagen
            $pelicula->caratula = asset('storage/caratulas/' . basename($pelicula->caratula));
            return response()->json($pelicula);
        } else {
            return response()->json(['error' => 'Película no encontrada'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $item = PeliculasM::findOrFail($id);
        // return view('Peliculas.Modal.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        dd($request->all()); 
    //     dd('Método update recibido', $request->all(), $id);
    //     $pelicula = PeliculasM::findOrFail($id);

    // // Validar los datos
    // $request->validate([
    //     'titulo' => 'required|string|max:255',
    //     'anio' => 'required|integer',
    //     'critica' => 'nullable|string',
    //     'caratula' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    // ]);

    // // Actualizar los campos
    // $pelicula->titulo = $request->input('titulo');
    // $pelicula->anio = $request->input('anio');
    // $pelicula->critica = $request->input('critica');

    // // Manejar la carga de la nueva imagen
    // if ($request->hasFile('caratula')) {
    //     $caratulaPath = $request->file('caratula')->store('caratulas');
    //     $pelicula->caratula = asset('storage/' . $caratulaPath);
    // }

    // $pelicula->save();

    // return response()->json($pelicula);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
