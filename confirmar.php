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

    // ✅ PREPARED STATEMENT (SEGURO)
    $stmt = $conn->prepare("INSERT INTO invitados (nombre, apellido, confirmacion) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $nombre, $apellido, $confirmacion);
    
    if ($stmt->execute()) {
        // Éxito
        $stmt->close();
        header("Location: index.php?success=1");
    } else {
        // Error
        $stmt->close();
        header("Location: index.php?error=1");
    }
} else {
    // Faltan datos
    header("Location: index.php?error=2");
}

$conn->close();
exit();
?>
