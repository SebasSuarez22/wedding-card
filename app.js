function actualizarContador() {
    const today = new Date();
    const finalDate = new Date(2026, 5, 27); //Los meses van de 0 a 11 


    //todo se trabaja en milisegundos 
    const subs = finalDate - today;
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


