function actualizarContador() {
    const today = new Date();
    const wd = window.WEDDING_DATE || { anio: 2031, mes: 6, dia: 27, hora: 17, minuto: 0 };
    // wd.mes viene en formato humano (1-12); Date lo espera en 0-11
    const finalDate = new Date(wd.anio, wd.mes - 1, wd.dia, wd.hora ?? 0, wd.minuto ?? 0); 


    //todo se trabaja en milisegundos
    const subs = finalDate - today;

    if (subs <= 0) {
        document.getElementById("days").textContent = 0;
        document.getElementById("hours").textContent = 0;
        document.getElementById("minutes").textContent = 0;
        document.getElementById("seconds").textContent = 0;
        return;
    }

    const msPorDia = 86400000;
    const msPorHora = 3600000;
    const msPorminuto = 60000;
    const msPorSeg = 1000;

    const days = Math.floor(subs / msPorDia);
    const hours = Math.floor((subs % msPorDia) / msPorHora);
    const minutes = Math.floor((subs % msPorHora) / msPorminuto);
    const seconds = Math.floor((subs % msPorminuto) / msPorSeg);

    document.getElementById("days").textContent = days;
    document.getElementById("hours").textContent = hours;
    document.getElementById("minutes").textContent = minutes;
    document.getElementById("seconds").textContent = seconds;

}

setInterval(actualizarContador, 1000);
actualizarContador();

// Función para mostrar las secciones ocultas
function verDetalles() {
    // Mostrar page2, page3, page4, page5
    const page2 = document.getElementById('page2');
    const page3 = document.getElementById('page3');
    const page4 = document.getElementById('page4');
    const page5 = document.getElementById('page5');
    
    // Remover d-none de todas
    if (page2) {
        page2.classList.remove('d-none');
        page2.classList.add('d-flex');  // Cambiar a d-flex
    }
    if (page3) page3.classList.remove('d-none');
    if (page4) page4.classList.remove('d-none');
    if (page5) page5.classList.remove('d-none');
    
    // Opcional: hacer scroll suave hasta page2
    if (page2) {
        setTimeout(() => {
            page2.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }, 100);
    }
}

// Tras confirmar el RSVP, ocultar toda la invitación y dejar solo la tarjeta de gracias
function mostrarGracias() {
    ['page1', 'page2', 'page3', 'page4', 'page5'].forEach((id) => {
        const el = document.getElementById(id);
        if (el) el.classList.add('d-none');
    });

    const gracias = document.getElementById('gracias');
    if (gracias) gracias.classList.remove('d-none');
}


