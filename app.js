function pad(value) {
    return String(Math.max(0, value)).padStart(2, "0");
}

const finalDate = new Date(document.querySelector(".counter").dataset.fecha);



function actualizarContador() {
    const today = new Date();
    const subs = Math.max(0, finalDate - today);

    const msPorDia = 86400000;
    const msPorHora = 3600000;
    const msPorminuto = 60000;
    const msPorSeg = 1000;

    document.getElementById("days").textContent = pad(Math.floor(subs / msPorDia));
    document.getElementById("hours").textContent = pad(Math.floor((subs % msPorDia) / msPorHora));
    document.getElementById("minutes").textContent = pad(Math.floor((subs % msPorHora) / msPorminuto));
    document.getElementById("seconds").textContent = pad(Math.floor((subs % msPorminuto) / msPorSeg));
}

setInterval(actualizarContador, 1000);
actualizarContador();

function verDetalles() {
    ["page2", "page3", "page4", "page5"].forEach((id) => {
        const el = document.getElementById(id);
        if (el) el.classList.remove("is-hidden");
    });

    const page2 = document.getElementById("page2");
    if (page2) {
        setTimeout(() => {
            page2.scrollIntoView({ behavior: "smooth", block: "start" });
        }, 80);
    }
}

// Tras confirmar el RSVP, se oculta toda la invitación y queda solo la tarjeta de gracias
function mostrarGracias() {
    ["page1", "page2", "page3", "page4", "page5"].forEach((id) => {
        const el = document.getElementById(id);
        if (el) el.classList.add("is-hidden");
    });

    const gracias = document.getElementById("gracias");
    if (gracias) gracias.classList.remove("is-hidden");
}
