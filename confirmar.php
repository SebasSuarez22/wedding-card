<?php
$servername = "sql100.infinityfree.com";
$username = "if0_41605874";
$password = "ctVnlzQhMNSAF";
$dbname = "if0_41605874_wedding";

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
    header("Location: index.php");
}

$conn->close();

// Volver a la página de la invitación
exit();
?>
