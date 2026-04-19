<?php
include("includes/db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inmobiliaria</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Inmobiliaria</h1>

<a href="login.php">Login</a> |
<a href="frontend/registro.php">Registro</a>

<hr>

<h2>Pisos disponibles</h2>

<div class="container">
    <div class="grid">

<?php
$sql = "SELECT * FROM pisos WHERE vendido = 0";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>

        <div class="card">
            <img src="uploads/<?php echo $row['imagen'] ? $row['imagen'] : 'default.jpg'; ?>">

            <div class="card-content">
                <h3><?php echo $row['titulo']; ?></h3>

                <p><?php echo substr($row['descripcion'], 0, 100); ?>...</p>

                <p class="precio"><?php echo $row['precio']; ?> €</p>

                <p><?php echo $row['ciudad']; ?></p>
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