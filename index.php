<?php
$servername = "sql100.infinityfree.com";
$username = "if0_41605874";
$password = "ctVnlzQhMNSAF";
$dbname = "if0_41605874_wedding";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Wedding card</title>
    <link rel="shortcut icon" href="./img/icon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- 1️⃣ PRIMERO: Bootstrap (framework base) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- 2️⃣ DESPUÉS: Tu CSS personal (para sobrescribir si quieres) -->
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
    <div class="container-fluid px-0">
        <section id="page1" class="row align-items-start justify-content-center mx-0">
            <div class="img d-flex justify-content-center align-items-center">
                <h1 class="text-center">Sebastian y Gina</h1>
            </div>
            <div class="part2 d-flex justify-content-start align-items-center flex-column">
                <h1 class="text-center">Sebastian y Gina</h1>
                <p class="col-10 text-center" style="color:#484343;">La historia más bonita que el destino escribió en nuestras vidas está por empezar...</p>
                <h1 class="text-center">!Nos Casamos¡</h1>
                <img src="./img/rings.png" class="img-fluid" style="max-width: 80px;">
                <p class="col-8 text-center versicle" style="color:#484343;">Mejor son dos que uno, porque obtienen más fruto de su esfuerzo. <br> Eclesiastés 4:9</p>
                <h1 class="text-center date">27 de junio del 2026</h1>
                <p class="col-8 text-center clothe" style="color:#484343;">Alista tu mejor traje, porque solo faltan.</p>

                <div class="counter d-flex justify-content-center w-100 gap-2">
                    <div class="days d-flex justify-content-center flex-column text-center gap-1">
                        <span id="days">0</span>
                        <span>Días</span>
                    </div>
                    <div class="hours d-flex justify-content-center flex-column text-center gap-1">
                        <span id="hours">0</span>
                        <span>Horas</span>
                    </div>
                    <div class="minutes d-flex justify-content-center flex-column text-center gap-1">
                        <span id="minutes">0</span>
                        <span>Minutos</span>
                    </div>
                    <div class="seconds d-flex justify-content-center flex-column text-center gap-1">
                        <span id="seconds">0</span>
                        <span>Segundos</span>
                    </div>
                </div>

                <h1 class="text-center invite">Te invitamos a ser parte de este momento especial</h1>

                <button class="wedding-button-secondary" onclick="verDetalles()">
                    Ver Detalles
                    <svg class="heart-icon" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                    </svg>
                </button>
            </div>
        </section>
        <section id="page2" class="d-none justify-content-center align-items-center gap-4 mt-2 mb-2">
            <img src="./img/pic1.jpeg" class="pic1">
            <img src="./img/pic2.jpeg" class="pic2">
        </section>
        <section id="page3" class="row d-none justify-content-center align-items-center gap-2">
            <div class="col-10 d-flex justify-content-center align-items-center flex-column word">
                <span class="word1">NUESTRA</span>
                <span class="word2">Boda</span>
            </div>
            <img src="./img/cups.png" class="col-4">
            <div class="col-10 d-flex align-items-center flex-column address">
                <h1>Ceremonia y Recepcion</h1>
                <p>Calle 44 # 44 - 66</p>
                <a href="https://www.google.com/maps/dir//Hotel+Genova,+Cl.+44+%2344-66,+Nte.+Centro+Historico,+Barranquilla,+Atl%C3%A1ntico/@10.9902587,-74.7902482,15z/data=!4m8!4m7!1m0!1m5!1m1!1s0x8ef42d63a462df4f:0xd3221847d001bfd0!2m2!1d-74.7844285!2d10.985023?entry=ttu&g_ep=EgoyMDI2MDMxMS4wIKXMDSoASAFQAw%3D%3D" target="_blank">
                    <button class="btn rounded-5">VER UBICACION</button>
                </a>
            </div>

        </section>
        <section id="page4" class="row d-none">
            <h1 class="main1 col-12 text-center">CODIGO DE <br><span class="main2">Vestimenta</span></h1>
            <div class="d-flex justify-content-center align-items-center">
                <div class="d-flex justify-content-center align-items-center flex-column gap-4">
                    <img src="./img/boy1.png" class="col-5 rounded-5">
                    <h2 class="col-5">Formal</h2>
                </div>
                <div class="d-flex justify-content-center align-items-center flex-column text-center gap-4">
                    <img src="./img/girls.jpg" class="col-5 rounded-5">
                    <h2 class="col-5">Vestido largo</h2>
                </div>
            </div>
            <div class="cr d-flex justify-content-center text-center flex-column">
                <h1>Colores Reservados</h1>
                <div class="d-flex justify-content-center align-content-center gap-2">
                    <button class="col-4 rounded-circle cir1"></button>
                    <button class="col-4 rounded-circle cir2"></button>
                    <button class="col-4 rounded-circle cir3"></button>
                    <button class="col-4 rounded-circle cir4"></button>
                    <button class="col-4 rounded-circle cir5"></button>
                </div>
            </div>
            <h2 class="col-12 text-center">Lluvia de Sobres</h2>
            <p class="col-12 text-center">TE ESPERAMOS</p>
            <p class="col-12 text-center">Con amor</p>
            <h2 class="col-12 text-center">Sebastian y Gina</h2>
        </section>
        <section id="page5" class="row d-none justify-content-center align-items-center gap-4">
            <h3 class="col-12 text-center">Confirma tu asistencia</h3>
            <form class="d-flex justify-content-center align-items-center flex-column gap-4" method="POST" action="confirmar.php">
                <div class="d-flex justify-content-center align-items-center gap-3">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <input type="text" id="nombre" name="nombre" minlength="3" class="border-1 rounded-4 w-100" required>
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <input type="text" id="apellido" name="apellido" minlength="3" class="border-1 rounded-4 w-100" required>
                        <label for="apellido">Apellido</label>
                    </div>
                </div>
                <div>
                    <div class="d-flex justify-content-center gap-3">
                        <div><input type="radio" name="respuesta" value="si" checked id="si"><label for="si">Si</label></div>
                        <div><input type="radio" name="respuesta" value="no" id="no"><label for="no">No</label></div>
                    </div>
                </div>
                <button type="submit" class="wedding-button">
                    Confirmar Asistencia
                    <svg class="heart-icon" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                    </svg>
                </button>
            </form>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="app.js"></script>
</body>

</html>