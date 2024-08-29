<div class="modal fade" id="nuevo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content bg-secondary text-light">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center">NUEVO CLIENTE</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>                       
            <div class="modal-body">
                <div class="bg-secondary rounded h-100 p-4">
                    <form method="POST" action="{{ route('clientes.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">C.I.</label>
                            <input type="number" class="form-control" name="ci" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Primer Apellido</label>
                            <input type="text" class="form-control" name="apellido1">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Segundo Apellido</label>
                            <input type="text" class="form-control" name="apellido2">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Direccion</label>
                            <input type="text" class="form-control" name="direccion">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Correo</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                </div>
            </div>
            <div class="modal-footer bg-secondary">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
        @if (session('save'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ session('save') }}",
                showConfirmButton: false,
                timer: 1500
                });
                // iziToast.success({
                //     title: '{{ session('save') }}',
                //     message: '',
                //     position: 'bottomRight',   
                //     timeout: 2500
                // });
            });
        </script>
    @endif
        </div>
    </div>
</div>
@if ($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        iziToast.error({
            title: 'Verifique los datos de entrada',
            message: '',
            position: 'bottomRight',   
            timeout: 2500
        });
    });
</script>
@endif