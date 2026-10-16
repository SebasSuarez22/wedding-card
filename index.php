<?php
$config = require __DIR__ . '/config.php';

$rsvpStatus = '';
if (isset($_GET['success'])) {
    $rsvpStatus = 'success';
} elseif (isset($_GET['error'])) {
    $rsvpStatus = 'error';
}
$f = $config['fecha'];
$fechaBoda = new DateTime(
    sprintf('%04d-%02d-%02d %02d:%02d:00', $f['anio'], $f['mes'], $f['dia'], $f['hora'] ?? 0, $f['minuto'] ?? 0),
    new DateTimeZone('America/Bogota')
);
$meses = [
    1 => 'enero',
    'febrero',
    'marzo',
    'abril',
    'mayo',
    'junio',
    'julio',
    'agosto',
    'septiembre',
    'octubre',
    'noviembre',
    'diciembre'
    ];
$dias  = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];

$fechaLarga  = $fechaBoda->format('j') . ' de ' . $meses[(int) $fechaBoda->format('n')] . ' de ' . $fechaBoda->format('Y');
$fechaConDia = $dias[(int) $fechaBoda->format('w')] . ' ' . $fechaLarga;
$horaTexto   = $fechaBoda->format('g:i') . ' ' . ($fechaBoda->format('A') === 'AM' ? 'a.m.' : 'p.m.');
$novios      = $config['novio'] . ' y ' . $config['novia'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="theme-color" content="#1C2430">
    <meta name="description" content="<?= htmlspecialchars($novios) ?> se casan el <?= $fechaLarga ?>. Confirma tu asistencia.">
    <title><?= htmlspecialchars($config['titulo_pagina']) ?> · <?= $fechaBoda->format('d.m.Y') ?></title>
    <link rel="shortcut icon" href="./img/icon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Great+Vibes&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
    <div class="ambient" aria-hidden="true"></div>

    <main class="invite-card">

        <section id="page1" class="sheet sheet--cover">
            <div class="hero">
                <p class="hero__eyebrow">Boda</p>
                <h1 class="hero__names"><?= htmlspecialchars($config['novio']) ?> <span>&amp;</span> <?= htmlspecialchars($config['novia']) ?></h1>
                <p class="hero__date"><?= $fechaBoda->format('d · m · Y') ?></p>
            </div>

            <div class="part2">
                <div class="part2__body">
                <p class="kicker">Con alegría</p>
                <h2 class="script-title"><?= htmlspecialchars($novios) ?></h2>
                <p class="lead"><?= htmlspecialchars($config['historia']) ?></p>
                <p class="announce">¡Nos casamos!</p>
                <img class="rings" src="./img/rings.png" alt="">

                <blockquote class="versicle">
                    <p><?= htmlspecialchars($config['versiculo_texto']) ?></p>
                    <cite><?= htmlspecialchars($config['versiculo_cita']) ?></cite>
                </blockquote>

                <div class="ornament" aria-hidden="true"><span></span></div>

                <div class="padres">
                    <p class="padres-titulo">Con la bendición de Dios y nuestros queridos padres</p>
                    <div class="padres-cols">
                        <?php foreach ($config['padres'] as $pareja): ?>
                        <div class="padres-col">
                            <span><?= htmlspecialchars($pareja[0]) ?></span>
                            <span class="amp">&amp;</span>
                            <span><?= htmlspecialchars($pareja[1]) ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="when">
                    <p class="when__time"><?= $horaTexto ?></p>
                    <p class="when__date"><?= $fechaConDia ?></p>
                </div>
                <p class="clothe">Alista tu mejor traje. Solo faltan…</p>

                <div class="counter" data-fecha="<?= $fechaBoda->format('c') ?>" aria-label="Cuenta regresiva">
                    <div>
                        <span id="days">00</span>
                        <span>Días</span>
                    </div>
                    <div>
                        <span id="hours">00</span>
                        <span>Horas</span>
                    </div>
                    <div>
                        <span id="minutes">00</span>
                        <span>Minutos</span>
                    </div>
                    <div>
                        <span id="seconds">00</span>
                        <span>Segundos</span>
                    </div>
                </div>

                <p class="invite">Te invitamos a ser parte de este momento especial</p>

                <button type="button" class="wedding-button-secondary" onclick="verDetalles()">
                    Ver detalles
                    <svg class="heart-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                    </svg>
                </button>
                </div>
            </div>
        </section>

        <section id="page2" class="sheet sheet--photos is-hidden" aria-label="Galería">
            <p class="kicker">Nuestra historia</p>
            <h2 class="section-title">Un atardecer<br><em>para recordar</em></h2>
            <div class="gallery">
                <figure class="gallery__main">
                    <img src="./img/pic2.jpeg" alt="Sebastian y Gina en la playa al atardecer">
                </figure>
                <figure class="gallery__inset">
                    <img src="./img/pic1.jpeg" alt="El anillo de compromiso">
                </figure>
            </div>
        </section>

        <section id="page3" class="sheet sheet--place is-hidden">
            <p class="kicker">El lugar</p>
            <div class="word">
                <span class="word1">Nuestra</span>
                <span class="word2">Boda</span>
            </div>
            <div class="address">
                <img class="cups" src="./img/cups.png" alt="">
                <h2><?= htmlspecialchars($config['ubicacion_titulo']) ?></h2>
                <p class="venue"><?= htmlspecialchars($config['ubicacion_lugar']) ?></p>
                <p><?= htmlspecialchars($config['ubicacion_direccion']) ?><br><?= htmlspecialchars($config['ubicacion_zona']) ?></p>
                <a class="btn-ubicacion" href="<?= htmlspecialchars($config['ubicacion_maps_url']) ?>" target="_blank" rel="noopener noreferrer">
                    Ver ubicación
                </a>
            </div>
        </section>

        <section id="page4" class="sheet sheet--dress is-hidden">
            <p class="kicker">Etiqueta</p>
            <h2 class="main1">Código de<br><span class="main2">vestimenta</span></h2>

            <div class="vestimenta-container">
                <figure class="vestimenta-item">
                    <img src="./img/boy1.jpg" alt="Traje formal para caballero">
                    <figcaption>Formal</figcaption>
                </figure>
                <figure class="vestimenta-item">
                    <img src="./img/girls.jpg" alt="Vestido largo para dama">
                    <figcaption>Vestido largo</figcaption>
                </figure>
            </div>

            <div class="cr">
                <h3>Colores reservados</h3>
                <p class="cr-note">Te pedimos evitar estos tonos</p>
                <div class="circles" aria-label="Colores reservados">
                    <span class="cir cir1" title="Blanco"></span>
                    <span class="cir cir2" title="Verde olivo"></span>
                    <span class="cir cir3" title="Verde claro"></span>
                    <span class="cir cir4" title="Verde oscuro"></span>
                    <span class="cir cir5" title="Verde vivo"></span>
                </div>
            </div>

            <div class="closing">
                <p class="lluvia">Lluvia de sobres</p>
                <p class="wait"><?= htmlspecialchars($config['despedida']) ?></p>
                <p class="love">Con amor</p>
                <p class="sign"><?= htmlspecialchars($novios) ?></p>
            </div>
        </section>

        <section id="page5" class="sheet sheet--rsvp is-hidden">
            <p class="kicker">RSVP</p>
            <h2>Confirma tu asistencia</h2>
            <p class="rsvp-lead">Nos ayuda mucho saber si estarás con nosotros.</p>

            <form method="POST" action="confirmar.php" novalidate>
                <div class="form-fields">
                    <div class="form-field">
                        <input type="text" id="nombre" name="nombre" minlength="3" placeholder=" " autocomplete="given-name" required>
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="form-field">
                        <input type="text" id="apellido" name="apellido" minlength="3" placeholder=" " autocomplete="family-name" required>
                        <label for="apellido">Apellido</label>
                    </div>
                </div>

                <fieldset class="radio-group">
                    <legend class="visually-hidden">¿Asistirás?</legend>
                    <div>
                        <input type="radio" name="respuesta" value="si" id="si" checked>
                        <label for="si">Sí asistiré</label>
                    </div>
                    <div>
                        <input type="radio" name="respuesta" value="no" id="no">
                        <label for="no">No podré ir</label>
                    </div>
                </fieldset>

                <button type="submit" class="wedding-button">
                    Confirmar asistencia
                    <svg class="heart-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                    </svg>
                </button>
            </form>
        </section>

        <section id="gracias" class="sheet sheet--thanks is-hidden" aria-live="polite">
            <div class="gracias-card">
                <img src="./img/rings.png" alt="">
                <?php if ($rsvpStatus === 'error'): ?>
                    <h2 class="gracias-title gracias-error">No pudimos guardar tu respuesta</h2>
                    <p>Inténtalo de nuevo en unos minutos.</p>
                    <a href="index.php" class="wedding-button-secondary">Volver a intentar</a>
                <?php else: ?>
                    <h2 class="gracias-title gracias-success">¡Gracias por confirmar tu asistencia!</h2>
                    <p>Nos vemos el <?= htmlspecialchars($fechaConDia) ?></p>
                <?php endif; ?>
            </div>
        </section>

    </main>

    <script src="app.js"></script>
    <?php if ($rsvpStatus !== ''): ?>
    <script>mostrarGracias();</script>
    <?php endif; ?>
</body>

</html>