@extends('welcome')
@section('content')
<div class="content">
<x-navbar></x-navbar>
@include('Clientes.create')
<div class="d-flex justify-content-end mt-4 mb-4">
    <button type="button" class="btn btn-primary me-5" data-bs-toggle="modal" data-bs-target="#nuevo">
      Nuevo
    </button>
        <a type="button" target="_blank" class="btn btn-outline btn-info me-5" href="{{route('clientes.pdf')}}">Reporte</a>

</div>

<div class="container-fluid pt-4 px-4">
  <div class="bg-secondary rounded p-4">
      <div class="d-flex justify-content-between mb-4">
          <h6 class="mb-0">Lista</h6>
      </div>
      <div class="table-responsive">
          <table class="table text-start align-middle table-bordered table-hover mb-0">
              <thead>
                  <tr class="text-white">
                      <th scope="col">N°</th>
                      <th scope="col">CI</th>
                      <th scope="col">NOMBRES</th>
                      <th scope="col">PRIMER APELLIDO</th>
                      <th scope="col">SEGUNDO APELLIDO</th>
                      <th scope="col">DIRECCION</th>
                      <th scope="col">EMAIL</th>
                      <th scope="col">EDITAR</th>
                      <th scope="col">ELIMINAR</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($items as $item)
                          <tr>
                              <td>{{ $item->cod_cliente }}</td>
                              <td>{{ $item->ci }}</td>
                              <td>{{ $item->nombre }}</td>
                              <td>{{ $item->apellido1 }}</td>
                              <td>{{ $item->apellido2 }}</td>
                              <td>{{ $item->direccion }}</td>
                              <td>{{ $item->email }}</td>
                              <div>
                                <td>
                                    <button class="btn btn-success edit-btn" data-cod-cliente="{{ $item->cod_cliente }}" data-bs-toggle="modal" data-bs-target="#editModal">Editar</button>
                                </td>                                 
                            </div>
                              <td>
                                <form id="delete-form-{{ $item->cod_cliente }}" action="{{ route('clientes.destroy', $item->cod_cliente) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="button" onclick="confirmDelete({{ $item->cod_cliente }})">Eliminar</button>
                                </form>
                              </td>         
                          </tr>               
                      @endforeach
              </tbody>
          </table>
      </div>
  </div>
</div>
</div>
@if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                iziToast.success({
                    title: '{{ session('success') }}',
                    message: '',
                    position: 'bottomRight',   
                    timeout: 2500
                });
            });
        </script>
    @endif
<script>
    function confirmDelete(clienteId) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡Esta acción no se puede deshacer!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + clienteId).submit();
            }
        });
    }
</script>
@include('Clientes.edit')
@endsection
