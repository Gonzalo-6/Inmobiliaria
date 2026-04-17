<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();
}
?>

<h1>Bienvenido <?php echo $_SESSION['nombre']; ?></h1>
<p>Tipo: <?php echo $_SESSION['tipo']; ?></p>

<a href="../logout.php">Cerrar sesión</a>
