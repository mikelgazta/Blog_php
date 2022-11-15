<?php
session_start();
if (! isset($_SESSION['username'])) {
    header("Location: V_Loginform.php");
}else {
    $mysqli = new mysqli("localhost", "root", "", "proyecto_blog");
    if ($mysqli->connect_errno) {
        echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    
    $resultado = $mysqli->query("SELECT * FROM post");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="tableStyle.css">

<title>Inicio</title>
</head>
<body>
	<h1 align="center">Plaiaundi Blog</h1>
	<h3 align="center">Bienvenido <?=$_SESSION['username']?></h3>
	<h3 align="center">Estos son los posts actuales:</h3>
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
		</tr>    		
		</thead>
		<tbody>
			<tr>
			<?php while ($row = $resultado->fetch_assoc()) {?>
            
				<td><?php echo $row['id']?></td>
				<td><?php echo $row['title']?></td>
				<td><?php echo $row['brief']?></td>
				<td><?php echo $row['content']?></td>
				<td><?php echo $row['image']?></td>
				<td><?php echo $row['created_at']?></td>
				<td><?php echo $row['status']?></td>
				<td><?php echo $row['user_id']?></td>
			</tr>
			<?php }?>
		</tbody>
	</table>
	<?php $mysqli->close();
?>
		<button onclick="location.href='../Views/V_SelectUser.php'">Crear Usuario</button>
		<button onclick="location.href='../Views/V_SelectPost.php'">Crear Post</button>
		<button onclick="location.href='../Views/V_SelectComment.php'">Crear Comentario</button>
		<button onclick="location.href='../System/C_Logout.php'">Logout</button>
		
</body>
</html>