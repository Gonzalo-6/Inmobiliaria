<?php
session_start();
include("../includes/db.php");

// 🔒 Solo vendedores
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 'vendedor') {
    header("Location: ../login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: mis_pisos.php");
    exit();
}

$id = $_GET['id'];
$id_vendedor = $_SESSION['id'];

// 🔒 Solo elimina si es suyo
$sql = "DELETE FROM pisos WHERE id=$id AND id_vendedor=$id_vendedor";

if ($conn->query($sql)) {
    header("Location: mis_pisos.php");
    exit();
} else {
    echo "Error al eliminar";
}
?>