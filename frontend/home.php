<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();
}
?>

<h1>Bienvenido <?php echo $_SESSION['nombre']; ?></h1>
<p>Tipo: <?php echo $_SESSION['tipo']; ?></p>

<hr>

<?php if ($_SESSION['tipo'] == 'comprador') { ?>

    <h2>Zona Comprador</h2>
    <a href="ver_pisos.php">Ver pisos disponibles</a>

<?php } elseif ($_SESSION['tipo'] == 'vendedor') { ?>

    <h2>Zona Vendedor</h2>
    <a href="crear_piso.php">Publicar piso</a><br>
    <a href="mis_pisos.php">Mis pisos</a>

<?php } ?>

<br><br>
<a href="../logout.php">Cerrar sesión</a>