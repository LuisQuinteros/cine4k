<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content bg-secondary text-light">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="editModalLabel">Editar Cliente</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" action="{{ route('clientes.update', ['cliente' => ':cod_cliente']) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="cod_cliente" id="clientCodCliente">
                    <div class="mb-3">
                        <label for="editCi" class="form-label">CI</label>
                        <input type="text" class="form-control" id="editCi" name="ci">
                    </div>
                    <div class="mb-3">
                        <label for="editNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="editNombre" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="editNombre" class="form-label">Primer Apellido</label>
                        <input type="text" class="form-control" id="editApellido1" name="apellido1">
                    </div>
                    <div class="mb-3">
                        <label for="editNombre" class="form-label">Segundo Apellido</label>
                        <input type="text" class="form-control" id="editApellido2" name="apellido2">
                    </div>
                    <div class="mb-3">
                        <label for="editNombre" class="form-label">Direccion</label>
                        <input type="text" class="form-control" id="editDireccion" name="direccion">
                    </div>
                    <div class="mb-3">
                        <label for="editNombre" class="form-label">Correo</label>
                        <input type="text" class="form-control" id="editEmail" name="email">
                    </div>
                    <div class="modal-footer bg-secondary">
                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-btn');
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const codCliente = this.getAttribute('data-cod-cliente');
            
            fetch(`/clientes/${codCliente}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('clientCodCliente').value = data.cod_cliente;
                    document.getElementById('editCi').value = data.ci;
                    document.getElementById('editNombre').value = data.nombre;
                    document.getElementById('editApellido1').value = data.apellido1;
                    document.getElementById('editApellido2').value = data.apellido2 || '';
                    document.getElementById('editDireccion').value = data.direccion;
                    document.getElementById('editEmail').value = data.email;

                    // Cambiar la URL de acción del formulario
                    const form = document.getElementById('editForm');
                    form.action = form.action.replace(':cod_cliente', codCliente);
                });
        });
    });
});

</script>