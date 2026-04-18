<?php
session_start();
include("../includes/db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pisos disponibles</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h1>Pisos disponibles</h1>

<a href="home.php">← Volver</a>

<hr>

<div class="container">
    <div class="grid">

<?php
$sql = "SELECT * FROM pisos WHERE vendido = 0";
$result = $conn->query($sql);

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

                <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'comprador') { ?>
                    <a class="btn" href="comprar.php?id=<?php echo $row['id']; ?>">Comprar</a>
                <?php } ?>
            </div>
        </div>

<?php
    }
} else {
    echo "No hay pisos disponibles";
}
?>

    </div>
</div>

</body>
</html>