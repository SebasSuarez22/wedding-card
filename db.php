<?php
$url = getenv('MYSQL_URL') ?: getenv('MYSQL_PUBLIC_URL');

if ($url) {
    $parts = parse_url($url);
    $host = $parts['host'];
    $port = $parts['port'] ?? 3306;
    $user = urldecode($parts['user']);
    $password = urldecode($parts['pass']);
    $dbname = ltrim($parts['path'], '/');
} else {
    $host = getenv('MYSQLHOST') ?: 'localhost';
    $port = getenv('MYSQLPORT') ?: '3306';
    $user = getenv('MYSQLUSER') ?: 'root';
    $password = getenv('MYSQLPASSWORD') ?: '';
    $dbname = getenv('MYSQLDATABASE') ?: 'wedding';
}

$conn = new mysqli($host, $user, $password, $dbname, (int) $port);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
