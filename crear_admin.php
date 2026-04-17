<?php
include("includes/db.php");

$password = password_hash("1234", PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nombre, email, password, tipo)
VALUES ('Admin', 'admin@admin.com', '$password', 'admin')";

if ($conn->query($sql)) {
    echo "Admin creado";
} else {
    echo "Error";
}
?>