<?php
session_start();
include("../includes/db.php");

if ($_SESSION['tipo'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

$id = $_GET['id'];

$sql = "DELETE FROM pisos WHERE id=$id";

if ($conn->query($sql)) {
    header("Location: pisos.php");
    exit();
} else {
    echo "Error al eliminar";
}
?>
