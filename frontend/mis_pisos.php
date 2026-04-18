<?php
session_start();
include("../includes/db.php");

// 🔒 Solo vendedores
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 'vendedor') {
    header("Location: ../login.php");
    exit();
}

$id_vendedor = $_SESSION['id'];

// 🔥 CONSULTA CORRECTA
$sql = "SELECT * FROM pisos WHERE id_vendedor = $id_vendedor";
$result = $conn->query($sql);
?>

<h1>Mis pisos</h1>

<a href="home.php">← Volver</a>
<hr>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>

    <div style="border:1px solid black; margin:10px; padding:10px;">
        <h3><?php echo $row['titulo']; ?></h3>
        <p><?php echo $row['descripcion']; ?></p>
        <p><strong>Precio:</strong> <?php echo $row['precio']; ?> €</p>
        <p><strong>Ciudad:</strong> <?php echo $row['ciudad']; ?></p>
        <p><strong>Vendido:</strong> <?php echo $row['vendido'] ? 'Sí' : 'No'; ?></p>
    </div>

<?php
    }
} else {
    echo "No tienes pisos publicados";
}
?>