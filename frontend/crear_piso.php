<?php
session_start();
include("../includes/db.php");

// 🔒 Solo vendedores
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 'vendedor') {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $ciudad = $_POST['ciudad'];
    $id_vendedor = $_SESSION['id'];

    // 🖼️ SUBIR IMAGEN
    $imagen_nombre = "";

    if (isset($_FILES['imagen']) && $_FILES['imagen']['name'] != "") {
        $imagen_nombre = time() . "_" . $_FILES['imagen']['name'];
        move_uploaded_file($_FILES['imagen']['tmp_name'], "../uploads/" . $imagen_nombre);
    }

    // 🔥 INSERT CON IMAGEN
    $sql = "INSERT INTO pisos (titulo, descripcion, precio, ciudad, id_vendedor, imagen)
            VALUES ('$titulo', '$descripcion', '$precio', '$ciudad', '$id_vendedor', '$imagen_nombre')";

    if ($conn->query($sql)) {
        header("Location: home.php");
        exit();
    } else {
        echo "Error al crear piso";
    }
}
?>

<h1>Publicar piso</h1>

<!-- 🔥 IMPORTANTE: enctype -->
<form method="POST" enctype="multipart/form-data">
    Titulo: <input type="text" name="titulo" required><br>
    Descripción: <textarea name="descripcion"></textarea><br>
    Precio: <input type="number" name="precio" required><br>
    Ciudad: <input type="text" name="ciudad" required><br>

    Imagen: <input type="file" name="imagen"><br><br>

    <button type="submit">Publicar</button>
</form>

<br>
<a href="home.php">← Volver</a>