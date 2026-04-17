<?php
session_start();
include("../includes/db.php");

if ($_SESSION['tipo'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);
?>

<h1>Lista de usuarios</h1>

<a href="crear_usuario.php">➕ Crear usuario</a>
<br><br>

<table border="1">
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Email</th>
    <th>Tipo</th>
    <th>Acciones</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['nombre']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['tipo']; ?></td>
    <td>
        <a href="editar_usuario.php?id=<?php echo $row['id']; ?>">Editar</a>
        |
        <a href="eliminar_usuario.php?id=<?php echo $row['id']; ?>">Eliminar</a>
    </td>
</tr>
<?php } ?>

</table>