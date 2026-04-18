<?php
include("../includes/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password_raw = $_POST['password'];
    $tipo = $_POST['tipo'];

    // 1. VALIDAR CAMPOS
    if (empty($nombre) || empty($email) || empty($password_raw)) {
        echo "Todos los campos son obligatorios";
    } else {

        // 2. COMPROBAR EMAIL
        $check = "SELECT * FROM usuarios WHERE email='$email'";
        $result = $conn->query($check);

        if ($result->num_rows > 0) {
            echo "El email ya está registrado";
        } else {

            // 3. INSERTAR
            $password = password_hash($password_raw, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (nombre, email, password, tipo)
                    VALUES ('$nombre', '$email', '$password', '$tipo')";

            if ($conn->query($sql)) {

                // 4. REDIRIGIR (FORMA PRO)
                header("Location: ../login.php?registro=ok");
                exit();

            } else {
                echo " Error al registrar";
            }
        }
    }
}
?>

<h1>Registro</h1>

<form method="POST">
    Nombre: <input type="text" name="nombre" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>

    Tipo:
    <select name="tipo">
        <option value="comprador">Comprador</option>
        <option value="vendedor">Vendedor</option>
    </select><br><br>

    <button type="submit">Registrarse</button>
</form>