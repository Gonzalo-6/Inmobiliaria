<?php
session_start();
include("../includes/db.php");

if ($_SESSION['tipo'] != 'admin') {
    header("Location: ../login.php");
    exit();
}
// VALIDAR ID
if (!isset($_GET['id'])) {
    header("Location: usuarios.php");
    exit();
}

$id = $_GET['id'];

//comprobar que existe

$sql_check = "SELECT * FROM usuarios WHERE id=$id";
$result = $conn->query($sql_check);

if ($result->num_rows == 0) {
    echo "Usuario no encontrado";
    exit();
}

if ($id == $_SESSION['id']) {
    echo "No puedes eliminar tu propio usuario";
    exit();
}

$sql = "DELETE FROM usuarios WHERE id=$id";


if ($conn->query($sql)) {
    header("Location: usuarios.php");
    exit();
} else {
    echo "Error al eliminar";
}
?>