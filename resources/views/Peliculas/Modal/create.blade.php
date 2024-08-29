<style>
    .img-preview {
        max-width: 100%; /* Ajusta el tamaño máximo de la imagen de vista previa */
        max-height: 300px; /* Ajusta la altura máxima para evitar imágenes demasiado grandes */
        object-fit: cover; /* Ajusta el tamaño de la imagen para que se ajuste al contenedor */
    }
</style>

<div class="modal fade" id="nuevo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content bg-secondary text-light">
            <div class="modal-header">
                <h5 class="modal-title text-center">NUEVA PELICULA</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="bg-secondary rounded h-100 p-4">
                    <form method="POST" action="{{ route('pelicula.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Título</label>
                            <input type="text" class="form-control" name="titulo">
                        </div>
                        <div class="mb-3">
                            <label for="exampleSelect" class="form-label">Año</label>
                            <select class="form-select" name="anio">
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
                            <textarea id="critica" class="form-control" name="critica" rows="5" placeholder="Escribe tu crítica aquí..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="imageUpload" class="form-label">Seleccionar Imagen</label>
                            <input type="file" class="form-control" id="imageUpload" name="caratula">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Vista Previa de Imagen</label>
                            <img id="imagePreview" class="img-preview" src="#" alt="Vista Previa de Imagen" style="display: none;">
                        </div>
                </div>
            </div>
            <div class="modal-footer bg-secondary">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('imageUpload').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        
        if (file) {
            reader.onload = function(e) {
                const img = document.getElementById('imagePreview');
                img.src = e.target.result;
                img.style.display = 'block'; // Mostrar la imagen de vista previa
            };
            
            reader.readAsDataURL(file);
        } else {
            const img = document.getElementById('imagePreview');
            img.src = '#';
            img.style.display = 'none'; // Ocultar la imagen si no hay archivo
        }
    });
</script>
