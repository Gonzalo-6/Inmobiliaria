<?php
session_start();
include("../includes/db.php");

// Solo vendedores
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 'vendedor') {
    header("Location: ../login.php");
    exit();
}

$id_vendedor = $_SESSION['id'];

$sql = "SELECT * FROM pisos WHERE id_vendedor = $id_vendedor";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mis pisos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h1>Mis pisos</h1>

<a href="home.php">← Volver</a>

<hr>

<div class="container">
    <div class="grid">

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>

        <div class="card">

            <img src="../uploads/<?php echo $row['imagen'] ?: 'default.jpg'; ?>">

            <div class="card-content">
                <h3><?php echo $row['titulo']; ?></h3>

                <p><?php echo substr($row['descripcion'], 0, 100); ?>...</p>

                <p class="precio"><?php echo $row['precio']; ?> €</p>

                <p><?php echo $row['ciudad']; ?></p>

                <p><strong>Vendido:</strong> <?php echo $row['vendido'] ? 'Sí' : 'No'; ?></p>

                <a href="editar_piso.php?id=<?php echo $row['id']; ?>">Editar</a> |
                <a href="eliminar_piso.php?id=<?php echo $row['id']; ?>">Eliminar</a>
            </div>
        </div>

<?php
    }
} else {
    echo "No tienes pisos publicados";
}
?>

    </div>
</div>

</body>
</html>