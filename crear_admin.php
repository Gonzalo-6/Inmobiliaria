<?php
include("includes/db.php");

$password = password_hash("1234", PASSWORD_DEFAULT);

// Comprobar si ya existe el admin
$sql_check = "SELECT * FROM usuarios WHERE email='admin@admin.com'";
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {
    echo "⚠️ El admin ya existe";
} else {

    $sql = "INSERT INTO usuarios (nombre, email, password, tipo)
    VALUES ('Admin', 'admin@admin.com', '$password', 'admin')";

    if ($conn->query($sql)) {
        echo "✅ Admin creado correctamente";
    } else {
        echo "❌ Error al crear admin";
    }
}
?>