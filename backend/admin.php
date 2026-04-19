<?php
session_start();

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 'admin') {
    header("Location: ../login.php");
    exit();
}
?>

<h1>Panel de Administración</h1>

<p>Bienvenido <?php echo $_SESSION['nombre']; ?></p>

<hr>

<h2>Gestión</h2>

<a href="usuarios.php">👤 Gestionar usuarios</a><br><br>
<a href="pisos.php">🏠 Gestionar pisos</a><br><br>

<hr>

<a href="../logout.php">Cerrar sesión</a>