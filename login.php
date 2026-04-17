<?php
session_start();
include("includes/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            $_SESSION['id'] = $user['id'];
            $_SESSION['tipo'] = $user['tipo'];
            $_SESSION['nombre'] = $user['nombre'];

            if ($user['tipo'] == 'admin') {
                header("Location: backend/admin.php");
            } else {
                header("Location: frontend/home.php");
            }
            exit();
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="POST">
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Entrar</button>
</form>

</body>
</html>