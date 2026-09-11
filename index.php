<?php
$config = require __DIR__ . '/config.php';

$rsvpMessage = null;
$rsvpType = null;
if (isset($_GET['success'])) {
    $rsvpMessage = '¡Gracias por confirmar tu asistencia!';
    $rsvpType = 'success';
} elseif (isset($_GET['error'])) {
    $rsvpMessage = 'Ups, algo salió mal al confirmar. Por favor intenta de nuevo.';
    $rsvpType = 'error';
}

$tema = basename($config['tema'] ?? '');
$temaPath = __DIR__ . '/themes/' . $tema . '.css';
$temaHref = ($tema !== '' && $tema !== 'sage-gold' && file_exists($temaPath)) ? 'themes/' . $tema . '.css' : null;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title><?= htmlspecialchars($config['titulo_pagina']) ?></title>
    <link rel="shortcut icon" href="./img/icon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap solo para utilidades puntuales -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS propio SIEMPRE después de Bootstrap para sobrescribir -->
    <link rel="stylesheet" href="stylesheet.css">
    <?php if ($temaHref): ?>
    <!-- Tema de colores de esta boda -->
    <link rel="stylesheet" href="<?= htmlspecialchars($temaHref) ?>">
    <?php endif; ?>
</head>

<body>
    <div class="container-fluid">

        <!-- ===== PAGE 1: PORTADA ===== -->
        <section id="page1">

            <!-- Imagen de manos -->
            <div class="img">
                <h1><?= htmlspecialchars($config['novio'] . ' y ' . $config['novia']) ?></h1>
            </div>

            <!-- Panel blanco con contenido -->
            <div class="part2">
                <h1><?= htmlspecialchars($config['novio'] . ' y ' . $config['novia']) ?></h1>
                <p><?= htmlspecialchars($config['historia']) ?></p>
                <h1>¡Nos Casamos!</h1>
                <img src="./img/rings.png" alt="Anillos">
                <p class="versicle"><?= htmlspecialchars($config['versiculo_texto']) ?><br><?= htmlspecialchars($config['versiculo_cita']) ?></p>

                <!-- Padres -->
                <div class="padres">
                    <p class="padres-titulo">Con la bendición de Dios y nuestros queridos padres:</p>
                    <div class="padres-cols">
                        <?php foreach ($config['padres'] as $pareja): ?>
                        <div class="padres-col">
                            <span><?= htmlspecialchars($pareja[0]) ?></span>
                            <span>&amp;</span>
                            <span><?= htmlspecialchars($pareja[1]) ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <h1 class="date"><?= htmlspecialchars($config['fecha_texto']) ?></h1>
                <p class="clothe">Alista tu mejor traje, porque solo faltan.</p>

                <!-- Contador -->
                <div class="counter">
                    <div>
                        <span id="days">0</span>
                        <span>Días</span>
                    </div>
                    <div>
                        <span id="hours">0</span>
                        <span>Horas</span>
                    </div>
                    <div>
                        <span id="minutes">0</span>
                        <span>Minutos</span>
                    </div>
                    <div>
                        <span id="seconds">0</span>
                        <span>Segundos</span>
                    </div>
                </div>

                <h1 class="invite">Te invitamos a ser parte de este momento especial</h1>

                <button class="wedding-button-secondary" onclick="verDetalles()">
                    Ver Detalles
                    <svg class="heart-icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                    </svg>
                </button>
            </div>

        </section>

        <!-- ===== PAGE 2: FOTOS ===== -->
        <section id="page2" class="d-none">
            <img src="./img/pic1.jpeg" alt="Foto 1">
            <img src="./img/pic2.jpeg" alt="Foto 2">
        </section>

        <!-- ===== PAGE 3: UBICACIÓN ===== -->
        <section id="page3" class="d-none">
            <div class="word">
                <span class="word1">NUESTRA</span>
                <span class="word2">Boda</span>
            </div>
            <img src="./img/cups.png" alt="Copas">
            <div class="address">
                <h1><?= htmlspecialchars($config['ubicacion_titulo']) ?></h1>
                <p><?= htmlspecialchars($config['ubicacion_direccion']) ?></p>
                <a href="<?= htmlspecialchars($config['ubicacion_maps_url']) ?>" target="_blank">
                    <button class="btn-ubicacion">VER UBICACION</button>
                </a>
            </div>
        </section>

        <!-- ===== PAGE 4: VESTIMENTA ===== -->
        <section id="page4" class="d-none">
            <h1 class="main1">CÓDIGO DE<br><span class="main2">Vestimenta</span></h1>

            <div class="vestimenta-container">
                <div class="vestimenta-item">
                    <img src="./img/boy1.jpg" alt="Hombre formal">
                    <h2>Formal</h2>
                </div>
                <div class="vestimenta-item">
                    <img src="./img/girls.jpg" alt="Vestido largo">
                    <h2>Vestido largo</h2>
                </div>
            </div>

            <div class="cr">
                <h1>Colores Reservados</h1>
                <div class="circles">
                    <span class="cir cir1"></span>
                    <span class="cir cir2"></span>
                    <span class="cir cir3"></span>
                    <span class="cir cir4"></span>
                    <span class="cir cir5"></span>
                </div>
            </div>

            <h2 class="lluvia">Lluvia de Sobres</h2>
            <p><?= htmlspecialchars($config['despedida']) ?></p>
            <p>Con amor</p>
            <h2><?= htmlspecialchars($config['novio'] . ' y ' . $config['novia']) ?></h2>
        </section>

        <!-- ===== PAGE 5: CONFIRMACIÓN ===== -->
        <section id="page5" class="d-none">
            <h3>Confirma tu asistencia</h3>

            <form method="POST" action="confirmar.php">

                <div class="form-fields">
                    <div class="form-field">
                        <input type="text" id="nombre" name="nombre" minlength="3" placeholder="Nombre" required>
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="form-field">
                        <input type="text" id="apellido" name="apellido" minlength="3" placeholder="Apellido" required>
                        <label for="apellido">Apellido</label>
                    </div>
                </div>

                <div class="radio-group">
                    <div>
                        <input type="radio" name="respuesta" value="si" id="si" checked>
                        <label for="si">Sí asistiré</label>
                    </div>
                    <div>
                        <input type="radio" name="respuesta" value="no" id="no">
                        <label for="no">No podré ir</label>
                    </div>
                </div>

                <button type="submit" class="wedding-button">
                    Confirmar Asistencia
                    <svg class="heart-icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                    </svg>
                </button>

            </form>
        </section>

        <!-- ===== GRACIAS: RESULTADO DEL RSVP ===== -->
        <section id="gracias" class="d-none">
            <div class="gracias-card">
                <img src="./img/rings.png" alt="Anillos">
                <?php if ($rsvpType === 'error'): ?>
                    <h1 class="gracias-title gracias-error">Ups, algo salió mal al confirmar</h1>
                    <p>Por favor intenta de nuevo.</p>
                    <a href="index.php" class="wedding-button-secondary">Volver a intentar</a>
                <?php else: ?>
                    <h1 class="gracias-title gracias-success">¡Gracias por confirmar tu asistencia!</h1>
                    <p>Nos vemos el <?= htmlspecialchars($config['fecha_texto']) ?></p>
                <?php endif; ?>
            </div>
        </section>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.WEDDING_DATE = <?= json_encode($config['fecha']) ?>;
    </script>
    <script src="app.js"></script>
    <?php if ($rsvpMessage): ?>
    <script>
        mostrarGracias();
    </script>
    <?php endif; ?>
</body>
<!-- Latest update -->
</html> 
