<?php

session_start();
if (! isset($_SESSION['username'])) {
    header("Location: V_loginform.php");
}else {
    $mysqli = new mysqli("localhost", "root", "", "proyecto_blog");
    if ($mysqli->connect_errno) {
        echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    
    /* Sentencia no preparada */
    $resultado = $mysqli->query("SELECT * FROM post");
    
    /* se recomienda el cierre explícito */
}
?>

<html>
<link rel="stylesheet" type="text/css" href="tableStyle.css">

<style>
</style>
<body>
	<h1 align="center">Todos los Posts:</h1>
	
    	<table class="styled-table">
		<thead>	
		<tr>
			<td> <?php echo "ID"?></td>
			<td> <?php echo "Titulo"?></td>
			<td> <?php echo "Resumen"?></td>
			<td> <?php echo "Contenido"?></td>
			<td> <?php echo "Imagen"?></td>
			<td> <?php echo "Creado en"?></td>
			<td> <?php echo "Estado"?></td>
			<td> <?php echo "Id Usuario"?></td>
			<td><a href="V_formPost.php" class="button">Nuevo Post</a><p> </p> <a href="V_Dashboard.php" class="button">Volver</a></td>

		</tr>    		
		</thead>
		<tbody>
			<tr>
			<?php while ($row = $resultado->fetch_assoc()) {
            $id = $row['id'];?>
            
				<td><?php echo $row['id']?></td>
				<td><?php echo $row['title']?></td>
				<td><?php echo $row['brief']?></td>
				<td><?php echo $row['content']?></td>
				<td><?php echo $row['image']?></td>
				<td><?php echo $row['created_at']?></td>
				<td><?php echo $row['status']?></td>
				<td><?php echo $row['user_id']?></td>
				<td><?php echo " <button onclick=\"location.href='../System/C_DeletePost.php?id=$id'\">Borrar</button> " . " <button onclick=\"location.href='V_formPost.php?id=$id'\">Editar</button>" ?></td>
			</tr>
			<?php }?>
		</tbody>
	</table>
	<?php $mysqli->close();
?>
</body>
</html>

