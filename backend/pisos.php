<?php
session_start();
include("../includes/db.php");

if ($_SESSION['tipo'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

$sql = "SELECT * FROM pisos";
$result = $conn->query($sql);
?>

<h1>Lista de pisos</h1>

<a href="crear_piso.php">➕ Crear piso</a>
<br><br>

<table border="1">
<tr>
    <th>ID</th>
    <th>Titulo</th>
    <th>Precio</th>
    <th>Ciudad</th>
    <th>Vendido</th>
    <th>Acciones</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['titulo']; ?></td>
    <td><?php echo $row['precio']; ?></td>
    <td><?php echo $row['ciudad']; ?></td>
    <td><?php echo $row['vendido'] ? 'Sí' : 'No'; ?></td>
    <td>
        <a href="editar_piso.php?id=<?php echo $row['id']; ?>">Editar</a>
        |
        <a href="eliminar_piso.php?id=<?php echo $row['id']; ?>">Eliminar</a>
    </td>
</tr>
<?php } ?>

</table>