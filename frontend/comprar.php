<?php
session_start();
include("../includes/db.php");

//  Solo compradores pueden comprar
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 'comprador') {
    header("Location: ../login.php");
    exit();
}

//  Validar ID
if (!isset($_GET['id'])) {
    header("Location: ver_pisos.php");
    exit();
}

$id = intval($_GET['id']);

//  Comprobar que el piso existe y no está vendido
$sql_check = "SELECT * FROM pisos WHERE id=$id AND vendido=0";
$result = $conn->query($sql_check);

if ($result->num_rows == 0) {
    echo "❌ Piso no disponible";
    exit();
}

//  Marcar como vendido
$sql = "UPDATE pisos SET vendido=1 WHERE id=$id";

if ($conn->query($sql)) {
    header("Location: ver_pisos.php");
    exit();
} else {
    echo "❌ Error al comprar";
}
?>