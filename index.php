<?php
$servername = "sql100.infinityfree.com";
$username = "if0_41605874";
$password = "ctVnlzQhMNSAF";
$dbname = "if0_41605874_wedding";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Wedding card</title>
    <link rel="shortcut icon" href="./img/icon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap solo para utilidades puntuales -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS propio SIEMPRE después de Bootstrap para sobrescribir -->
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
    <div class="container-fluid">

        <!-- ===== PAGE 1: PORTADA ===== -->
        <section id="page1">

            <!-- Imagen de manos -->
            <div class="img">
                <h1>Sebastian y Gina</h1>
            </div>

            <!-- Panel blanco con contenido -->
            <div class="part2">
                <h1>Sebastian y Gina</h1>
                <p>La historia más bonita que el destino escribió en nuestras vidas está por empezar...</p>
                <h1>¡Nos Casamos!</h1>
                <img src="./img/rings.png" alt="Anillos">
                <p class="versicle">Mejor son dos que uno, porque obtienen más fruto de su esfuerzo.<br>Eclesiastés 4:9</p>

                <!-- Padres -->
                <div class="padres">
                    <p class="padres-titulo">Con la bendición de Dios y nuestros queridos padres:</p>
                    <div class="padres-cols">
                        <div class="padres-col">
                            <span>Antonio Suárez</span>
                            <span>&amp;</span>
                            <span>Carmen Peñaloza</span>
                        </div>
                        <div class="padres-col">
                            <span>Manuel Pertuz</span>
                            <span>&amp;</span>
                            <span>Rosiris Martínez</span>
                        </div>
                    </div>
                </div>

                <h1 class="date">5:00 PM · 27 de junio del 2026</h1>
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
                <h1>Ceremonia y Recepción</h1>
                <p>Calle 44 # 44 - 66</p>
                <a href="https://www.google.com/maps/dir//Hotel+Genova,+Cl.+44+%2344-66,+Nte.+Centro+Historico,+Barranquilla,+Atl%C3%A1ntico/@10.9902587,-74.7902482,15z/data=!4m8!4m7!1m0!1m5!1m1!1s0x8ef42d63a462df4f:0xd3221847d001bfd0!2m2!1d-74.7844285!2d10.985023?entry=ttu&g_ep=EgoyMDI2MDMxMS4wIKXMDSoASAFQAw%3D%3D" target="_blank">
                    <button class="btn-ubicacion">VER UBICACION</button>
                </a>
            </div>
        </section>

        <!-- ===== PAGE 4: VESTIMENTA ===== -->
        <section id="page4" class="d-none">
            <h1 class="main1">CÓDIGO DE<br><span class="main2">Vestimenta</span></h1>

            <div class="vestimenta-container">
                <div class="vestimenta-item">
                    <img src="./img/boy1.png" alt="Hombre formal">
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
            <p>TE ESPERAMOS</p>
            <p>Con amor</p>
            <h2>Sebastian y Gina</h2>
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

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="app.js"></script>
</body>
<!-- Latest update -->
</html> 
