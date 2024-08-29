<style>
    .img-preview {
        max-width: 100%; /* Ajusta el tamaño máximo de la imagen de vista previa */
        max-height: 300px; /* Ajusta la altura máxima para evitar imágenes demasiado grandes */
        object-fit: cover; /* Ajusta el tamaño de la imagen para que se ajuste al contenedor */
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content bg-secondary text-light">
            <div class="modal-header">
                <h5 class="modal-title text-center">NUEVA PELICULA</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="bg-secondary rounded h-100 p-4">
                    <form id="editarForm">
                        <input type="hidden" name="id_pelicula" id="id_pelicula">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" class="form-control" id="e_titulo" name="titulo" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleSelect" class="form-label">Año</label>
                            <select class="form-select" id="e_anio" name="anio">
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="critica" class="form-label">Crítica</label>
                            <textarea id="e_critica" class="form-control" name="critica" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="imageUpload" class="form-label">Seleccionar Imagen</label>
                            <input type="file" class="form-control" id="imageUpload" name="caratula">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Vista Previa de Imagen</label>
                            <img id="editImagePreview" class="img-preview" src="#" alt="Vista Previa de Imagen" style="display: none;">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer bg-secondary">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const editarBtns = document.querySelectorAll('.editar-btn');
    const editarForm = document.getElementById('editarForm');
    const modal = new bootstrap.Modal(document.getElementById('editarModal'));
    const imageUpload = document.getElementById('imageUpload');
    const imagePreview = document.getElementById('imagePreview');

    editarBtns.forEach(btn => {
        btn.addEventListener('click', async function () {
            const peliculaId = this.getAttribute('data-id');
            try {
                const response = await fetch(`/pelicula/${peliculaId}`);
                if (!response.ok) throw new Error('Error al obtener los datos');
                
                const pelicula = await response.json();
                console.log(pelicula);
                document.getElementById('id_pelicula').value = pelicula.id_pelicula;
                document.getElementById('e_titulo').value = pelicula.titulo;
                document.getElementById('e_anio').value = pelicula.anio;
                document.getElementById('e_critica').value = pelicula.critica;

                if (pelicula.caratula) {
                    console.log(pelicula);
                    editImagePreview.src = pelicula.caratula; // URL de la imagen desde la base de datos
                    editImagePreview.style.display = 'block';
                } else {
                    editImagePreview.src = '#';
                    editImagePreview.style.display = 'none';
                }
                
                modal.show();
            } catch (error) {
                console.error('Error:', error);
            }
        });
    });
    imageUpload.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                editImagePreview.src = e.target.result;
                editImagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            editImagePreview.src = '#';
            editImagePreview.style.display = 'none';
        }
    });
    editarForm.addEventListener('submit', async function (event) {
    event.preventDefault();
    const formData = new FormData(editarForm);

    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const response = await fetch(`/pelicula/${formData.get('id_pelicula')}`, {
            method: 'PUT',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        if (!response.ok) {
            const errorText = await response.text();
            throw new Error(`Error ${response.status}: ${errorText}`);
        }

        location.reload();
    } catch (error) {
        console.error('Error:', error);
        alert('Error al actualizar la película: ' + error.message);
    }
});

});
</script>