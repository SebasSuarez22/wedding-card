<?php
$host = getenv('MYSQLHOST') ?: 'localhost';
$port = getenv('MYSQLPORT') ?: '3306';
$user = getenv('MYSQLUSER') ?: 'root';
$password = getenv('MYSQLPASSWORD') ?: '';
$dbname = getenv('MYSQLDATABASE') ?: 'wedding';

$conn = new mysqli($host, $user, $password, $dbname, (int) $port);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
