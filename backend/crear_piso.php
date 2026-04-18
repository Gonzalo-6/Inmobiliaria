<?php
session_start();
include("../includes/db.php");

if ($_SESSION['tipo'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $ciudad = $_POST['ciudad'];

    $sql = "INSERT INTO pisos (titulo, descripcion, precio, ciudad)
            VALUES ('$titulo', '$descripcion', '$precio', '$ciudad')";

    if ($conn->query($sql)) {
        header("Location: pisos.php");
        exit();
    } else {
        echo "Error al crear piso";
    }
}
?>

<h1>Crear piso</h1>

<form method="POST">
    Titulo: <input type="text" name="titulo" required><br>
    Descripción: <textarea name="descripcion"></textarea><br>
    Precio: <input type="number" name="precio" required><br>
    Ciudad: <input type="text" name="ciudad" required><br><br>

    <button type="submit">Crear</button>
</form>