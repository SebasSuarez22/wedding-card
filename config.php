<?php
/**
 * Configuración de esta boda: para reutilizar la plantilla con otra pareja,
 * edita solo este archivo (y reemplaza las fotos en /img manteniendo los
 * mismos nombres de archivo) — no hace falta tocar index.php ni app.js.
 */
return [
    // Tema de colores: 'sage-gold' | 'rose-burgundy' | 'blue-silver' | 'beige-granate' | 'blanco-negro'
    // (los archivos de tema viven en /themes)
    'tema' => 'rose-burgundy',

    'titulo_pagina' => 'Sebastian & Gina',

    'novio' => 'Sebastian',
    'novia' => 'Gina',

    'historia' => 'La historia más bonita que el destino escribió en nuestras vidas está por empezar...',

    'versiculo_texto' => 'Mejor son dos que uno, porque obtienen más fruto de su esfuerzo.',
    'versiculo_cita' => 'Eclesiastés 4:9',

    // Un par [nombre, nombre] por columna
    'padres' => [
        ['Antonio Suárez', 'Carmen Peñaloza'],
        ['Manuel Pertuz', 'Rosiris Martínez'],
    ],

    // Fecha/hora del evento. 'mes' en formato humano (1-12); se ajusta
    // automáticamente para el contador en JavaScript (que usa 0-11).
    'fecha' => [
        'anio' => 2031,
        'mes' => 6,
        'dia' => 27,
        'hora' => 17,
        'minuto' => 0,
    ],
    'fecha_texto' => '5:00 PM · 27 de junio del 2031',

    'ubicacion_titulo' => 'Ceremonia y Recepción',
    'ubicacion_direccion' => 'Calle 44 # 44 - 66',
    'ubicacion_maps_url' => 'https://www.google.com/maps/dir//Hotel+Genova,+Cl.+44+%2344-66,+Nte.+Centro+Historico,+Barranquilla,+Atl%C3%A1ntico/@10.9902587,-74.7902482,15z/data=!4m8!4m7!1m0!1m5!1m1!1s0x8ef42d63a462df4f:0xd3221847d001bfd0!2m2!1d-74.7844285!2d10.985023?entry=ttu&g_ep=EgoyMDI2MDMxMS4wIKXMDSoASAFQAw%3D%3D',

    'despedida' => 'TE ESPERAMOS',
];
