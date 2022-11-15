<?php
session_start();
if (! isset($_SESSION['username'])) {
    header("Location: V_Dashboard.php");
}else {
    $mysqli = new mysqli("localhost", "root", "", "proyecto_blog");
    if ($mysqli->connect_errno) {
        echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    
    /* Sentencia no preparada */
    $resultado = $mysqli->query("SELECT * FROM comment");
    
    /* se recomienda el cierre explícito */
}
?>

<html>
<link rel="stylesheet" type="text/css" href="tableStyle.css">

<style>

</style>
<body>
	<h1 align="center">Todos los Comentarios:</h1>
	
    	<table class="styled-table">
		<thead>	
		<tr>
			<td> <?php echo "ID"?></td>
			<td> <?php echo "Nombre"?></td>
			<td> <?php echo "Comentario"?></td>
			<td> <?php echo "Email"?></td>
			<td> <?php echo "Id de Post"?></td>
			<td> <?php echo "Creado en"?></td>
			<td> <?php echo "Estado"?></td>
			<td><a href="V_formComment.php" class="button">Nuevo Comentario</a><p> </p> <a href="V_Dashboard.php" class="button">Volver</a></td>
			
		</tr>    		
		</thead>
		<tbody>
			<tr>
			<?php while ($row = $resultado->fetch_assoc()) {
            $id = $row['id'];?>
            
				<td><?php echo $row['id']?></td>
				<td><?php echo $row['name']?></td>
				<td><?php echo $row['comment']?></td>
				<td><?php echo $row['email']?></td>
				<td><?php echo $row['post_id']?></td>
				<td><?php echo $row['created_at']?></td>
				<td><?php echo $row['status']?></td>
				<td><?php echo " <button onclick=\"location.href='../System/C_DeleteComment.php?id=$id'\">Borrar</button> " . " <button onclick=\"location.href='V_formComment.php?id=$id'\">Editar</button>" ?></td>
			</tr>
			<?php }?>
		</tbody>
	</table>
	<?php $mysqli->close();
?>
</body>
</html>