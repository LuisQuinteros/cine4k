@extends('welcome')
@section('content')
<div class="content">
<x-navbar></x-navbar>
   <!-- Button trigger modal -->
   <div class="d-flex justify-content-end mt-4 mb-4">
    <button type="button" class="btn btn-primary me-5" data-bs-toggle="modal" data-bs-target="#nuevo">
      Nuevo
    </button>
  </div>
  @include('Peliculas.Modal.create')

  <div id="modalContainer"></div>
  <div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Lista</h6>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col">N°</th>
                        <th scope="col">TITULO</th>
                        <th scope="col">AÑO</th>
                        <th scope="col">CRITICA</th>
                        <th scope="col">CARATULA</th>
                        <th scope="col">EDITAR</th>
                        <th scope="col">ELIMINAR</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                            <tr>
                                <td>{{ $item->id_pelicula }}</td>
                                <td>{{ $item->titulo }}</td>
                                <td>{{ $item->anio }}</td>
                                <td>{{ $item->critica }}</td>
                                <td>
                                    @if($item->caratula)
                                        <img src="{{ asset('storage/caratulas/' . basename($item->caratula)) }}" alt="Imagen de la película" style="width: 100px; height: auto;">
                                    @else
                                        <p>No disponible</p>
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <button class="btn btn-primary editar-btn" data-id="{{ $item->id_pelicula}}">Editar</button>      
                                    </div>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('pelicula.destroy', $item->id_pelicula) }}" onsubmit="return confirm('¿Estás seguro de eliminar este registro?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>                                
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('Peliculas.Modal.edit')
@endsection
