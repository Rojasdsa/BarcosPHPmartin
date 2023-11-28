'use strict'

// Scroll hacia la consulta
function scrollToConsulta(consultaId) {
    let consultaDiv = document.getElementById(consultaId);
    consultaDiv.scrollIntoView({ behavior: 'smooth' });
}

// Función para desplazarse a la parte superior de la página
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth', // Cambia 'smooth' a 'auto'
    });
}