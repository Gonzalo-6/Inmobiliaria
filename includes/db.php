<?php
$conn = new mysqli("localhost", "root", "C@ntalojas16", "inmobiliaria",);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>