<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wedding";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['respuesta'])) {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $confirmacion = ($_POST['respuesta'] == "si") ? 1 : 0;

    $sql = "INSERT INTO invitados (nombre, apellido, confirmacion) 
            VALUES ('$nombre', '$apellido', $confirmacion)";
    
    $conn->query($sql);
}

$conn->close();

// Volver a la página de la invitación
header("Location: card.php");
exit();
?>
