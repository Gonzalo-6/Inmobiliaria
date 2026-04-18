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
$id = intval($_GET['id']);
$id_vendedor = $_SESSION['id'];

// 🔒 Cargar solo SU piso
$sql = "SELECT * FROM pisos WHERE id=$id AND id_vendedor=$id_vendedor";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "No tienes permiso para editar este piso";
    exit();
}

$piso = $result->fetch_assoc();

// 📝 GUARDAR CAMBIOS
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $ciudad = $_POST['ciudad'];

    // 🔥 IMAGEN (opcional)
    $imagen_nombre = $piso['imagen'];

    if (isset($_FILES['imagen']) && $_FILES['imagen']['name'] != "") {

        $imagen_nombre = time() . "_" . $_FILES['imagen']['name'];

        move_uploaded_file(
            $_FILES['imagen']['tmp_name'],
            "../uploads/" . $imagen_nombre
        );
    }

    $sql = "UPDATE pisos 
            SET titulo='$titulo',
                descripcion='$descripcion',
                precio='$precio',
                ciudad='$ciudad',
                imagen='$imagen_nombre'
            WHERE id=$id AND id_vendedor=$id_vendedor";

    if ($conn->query($sql)) {
        header("Location: mis_pisos.php");
        exit();
    } else {
        echo "Error al actualizar";
    }
}
?>

<h1>Editar piso</h1>

<form method="POST" enctype="multipart/form-data">
    Titulo: <input type="text" name="titulo" value="<?php echo $piso['titulo']; ?>" required><br>
    Descripción: <textarea name="descripcion"><?php echo $piso['descripcion']; ?></textarea><br>
    Precio: <input type="number" name="precio" value="<?php echo $piso['precio']; ?>" required><br>
    Ciudad: <input type="text" name="ciudad" value="<?php echo $piso['ciudad']; ?>" required><br>

    Imagen actual:<br>
    <img src="../uploads/<?php echo $piso['imagen']; ?>" width="150"><br><br>

    Nueva imagen: <input type="file" name="imagen"><br><br>

    <button type="submit">Guardar cambios</button>
</form>

<br>
<a href="mis_pisos.php">← Volver</a>