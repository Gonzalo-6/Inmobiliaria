<?php
session_start();
include("../includes/db.php");

if ($_SESSION['tipo'] != 'admin') {
    header("Location: ../login.php");
    exit();
}
// VALIDAR ID
if (!isset($_GET['id'])) {
    header("Location: pisos.php");
    exit();
}


$id = intval($_GET['id']);

$sql_check = "SELECT * FROM pisos WHERE id=$id";
$result = $conn->query($sql_check);

if ($result->num_rows == 0) {
    echo "Piso no encontrado";
    exit();
}

$sql = "DELETE FROM pisos WHERE id=$id";

if ($conn->query($sql)) {
    header("Location: pisos.php");
    exit();
} else {
    echo "Error al eliminar";
}
?>
