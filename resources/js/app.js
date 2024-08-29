import './bootstrap';
import Swal from 'sweetalert2';

// Opcional: para tener SweetAlert2 disponible globalmente
window.Swal = Swal;
import 'izitoast/dist/css/iziToast.min.css'; // Importa el CSS
import iziToast from 'izitoast'; // Importa la librería iziToast

window.iziToast = iziToast; // Opcional: Hacer iziToast disponible globalmente
