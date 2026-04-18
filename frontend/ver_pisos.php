<?php
session_start();
include("../includes/db.php");

// permitir también acceso sin login luego
?>

<h1>Pisos disponibles</h1>

<a href="home.php">← Volver</a>

<hr>

<?php
$sql = "SELECT * FROM pisos WHERE vendido = 0";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
?>

        <div style="border:1px solid black; margin:10px; padding:10px;">
            <h3><?php echo $row['titulo']; ?></h3>
            <p><?php echo $row['descripcion']; ?></p>
            <p><strong>Precio:</strong> <?php echo $row['precio']; ?> €</p>
            <p><strong>Ciudad:</strong> <?php echo $row['ciudad']; ?></p>

            <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'comprador') { ?>
                <a href="comprar.php?id=<?php echo $row['id']; ?>">Comprar</a>
            <?php } ?>

        </div>

<?php
    }

} else {
    echo "No hay pisos disponibles";
}
?>