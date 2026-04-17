<?php
session_start();
include("../includes/db.php");

if ($_SESSION['tipo'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $tipo = $_POST['tipo'];

    $sql = "INSERT INTO usuarios (nombre, email, password, tipo)
            VALUES ('$nombre', '$email', '$password', '$tipo')";

    if ($conn->query($sql)) {
        header("Location: usuarios.php");
        exit();
    } else {
        echo "Error al crear usuario";
    }
}
?>

<h1>Crear usuario</h1>

<form method="POST">
    Nombre: <input type="text" name="nombre" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>

    Tipo:
    <select name="tipo">
        <option value="admin">Admin</option>
        <option value="comprador">Comprador</option>
        <option value="vendedor">Vendedor</option>
    </select><br><br>

    <button type="submit">Crear</button>
</form>