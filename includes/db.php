<?php
$conn = new mysqli("localhost", "root", "", "inmobiliaria");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>