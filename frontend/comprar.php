<?php
session_start();
include("../includes/db.php");

//  Solo compradores
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
$id_comprador = $_SESSION['id'];

// 🔍 Comprobar disponibilidad
$sql_check = "SELECT * FROM pisos WHERE id=$id AND vendido=0";
$result = $conn->query($sql_check);

if ($result->num_rows == 0) {
    echo "❌ Piso no disponible";
    exit();
}

//  Comprar piso
$sql = "UPDATE pisos 
        SET vendido=1, comprador_id=$id_comprador 
        WHERE id=$id";

if ($conn->query($sql)) {
    echo "✅ Compra realizada correctamente";
    echo "<br><a href='ver_pisos.php'>Volver</a>";
} else {
    echo "❌ Error al comprar";
}
?>