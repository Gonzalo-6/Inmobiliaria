<?php
session_start();
include("../includes/db.php");

if ($_SESSION['tipo'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

$id = $_GET['id'];

// GUARDAR CAMBIOS
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $ciudad = $_POST['ciudad'];

    $sql = "UPDATE pisos 
            SET titulo='$titulo', descripcion='$descripcion', precio='$precio', ciudad='$ciudad' 
            WHERE id=$id";

    if ($conn->query($sql)) {
        header("Location: pisos.php");  
        exit();
    } else {
        echo "Error al actualizar";
    }
}

// CARGAR DATOS
$sql = "SELECT * FROM pisos WHERE id=$id";
$result = $conn->query($sql);
$piso = $result->fetch_assoc();
?>

<h1>Editar piso</h1>
<form method="POST">
    Titulo: <input type="text" name="titulo" value="<?php echo $piso['titulo']; ?>" required><br>
    Descripción: <textarea name="descripcion"><?php echo $piso['descripcion']; ?></textarea><br>
    Precio: <input type="number" name="precio" value="<?php echo $piso['precio']; ?>" required><br>
    Ciudad: <input type="text" name="ciudad" value="<?php echo $piso['ciudad']; ?>" required><br><br>

    <button type="submit">Guardar cambios</button>  
</form>




