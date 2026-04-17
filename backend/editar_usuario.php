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

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $tipo = $_POST['tipo'];

    $sql = "UPDATE usuarios 
            SET nombre='$nombre', email='$email', tipo='$tipo' 
            WHERE id=$id";

    if ($conn->query($sql)) {
        header("Location: usuarios.php");
        exit();
    } else {
        echo "Error al actualizar";
    }
}

// CARGAR DATOS
$sql = "SELECT * FROM usuarios WHERE id=$id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<h1>Editar usuario</h1>

<form method="POST">
    Nombre: <input type="text" name="nombre" value="<?php echo $user['nombre']; ?>" required><br>
    Email: <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br>

    Tipo:
    <select name="tipo">
        <option value="admin" <?php if($user['tipo']=='admin') echo 'selected'; ?>>Admin</option>
        <option value="comprador" <?php if($user['tipo']=='comprador') echo 'selected'; ?>>Comprador</option>
        <option value="vendedor" <?php if($user['tipo']=='vendedor') echo 'selected'; ?>>Vendedor</option>
    </select><br><br>

    <button type="submit">Guardar cambios</button>
</form>