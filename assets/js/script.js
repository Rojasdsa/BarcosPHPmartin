'use strict'

// Scroll hacia la consulta
function scrollToConsulta(consultaId) {
    let consultaDiv = document.getElementById(consultaId);
    consultaDiv.scrollIntoView({ behavior: 'smooth' });
}