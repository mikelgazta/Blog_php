<?php
session_start();
if (! isset($_SESSION['username'])) {
    header("Location: V_loginform.php");
} else {
    $mysqli = new mysqli("localhost", "root", "", "proyecto_blog");
    if ($mysqli->connect_errno) {
        echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    /* Sentencia no preparada */
    $resultado = $mysqli->query("SELECT * FROM user");

    /* se recomienda el cierre explícito */
}
?>

<html>
<link rel="stylesheet" type="text/css" href="tableStyle.css">

<style>

</style>
<body>
	<h1 align="center">Todos los Usuarios:</h1>
	
    	<table class="styled-table">
		<thead>	
		<tr>
			<td> <?php echo "ID"?></td>
			<td> <?php echo "Nombre"?></td>
			<td> <?php echo "Apellido"?></td>
			<td> <?php echo "Usuario"?></td>
			<td> <?php echo "Correo"?></td>
			<td> <?php echo "Contraseña"?></td>
			<td> <?php echo "Imagen"?></td>
			<td> <?php echo "Status"?></td>
			<td> <?php echo "Tipo"?></td>
			<td> <?php echo "Creado en"?></td>
			<td><a href="V_formUser.php" class="button" role ="button">Nuevo Usuario</a><p> </p> <a href="V_Dashboard.php" class="button">Volver</a></td>
		</tr>    		
		</thead>
		<tbody>
			<tr>
			<?php while ($row = $resultado->fetch_assoc()) {
            $id = $row['id'];?>
            
				<td><?php echo $row['id']?></td>
				<td><?php echo $row['name']?></td>
				<td><?php echo $row['lastname']?></td>
				<td><?php echo $row['username']?></td>
				<td><?php echo $row['email']?></td>
				<td><?php echo $row['password']?></td>
				<td><?php echo $row['image']?></td>
				<td><?php echo $row['status']?></td>
				<td><?php echo $row['kind']?></td>
				<td><?php echo $row['created_at']?></td>
				<td><?php echo "<button onclick=\"location.href='../System/C_DeleteUser.php?id=$id'\">Borrar</button> " . " <button onclick=\"location.href='V_formUser.php?id=$id'\">Editar</button>" ?></td>
			</tr>
			<?php }?>
		</tbody>
	</table>
	<!--  <a href="V_formUser.php" class="button">Crear Usuario</a>
	<a href="V_Dashboard.php" class="button">Volver</a>
	-->
	<?php $mysqli->close(); ?>
	<br>
</body>
</html>

