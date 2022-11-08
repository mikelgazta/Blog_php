<!DOCTYPE html>
<html>
<style>
.button {
	font: 13px Arial;
	text-decoration: none;
	background-color: #EEEEEE;
	color: #333333;
	padding: 2px 6px 2px 6px;
	border-top: 1px solid #CCCCCC;
	border-right: 1px solid #333333;
	border-bottom: 1px solid #333333;
	border-left: 1px solid #CCCCCC;
}
</style>
<body>
<?php
if (isset($_GET['id'])) {
    $mysqli = new mysqli("localhost", "root", "", "proyecto_blog");
    if ($mysqli->connect_errno) {
        echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    /* Sentencia no preparada */
    $id = $_GET['id'];

    $entrada = $mysqli->query("SELECT * FROM post WHERE id='$id'");
    
    while ($row = $entrada->fetch_assoc()) {
        $id=$row['id'];
        $title = $row['title'];
        $brief = $row['brief'];
        $content = $row['content'];
        $image = $row['image'];
        $created_at = $row['created_at'];
        $status = $row['status'];
        $user_id = $row['user_id'];
        //echo($row['dni'] . " - " . $row['title'] . " - " . $row['brief'] . " - " . $row['content'] . " - " . $row['image']. " - " . $row['created_at']. " <button onclick=\"location.href='delete_test.php?dni=$dni'\">Borrar</button> ". " <button onclick=\"location.href='formulario.php?dni=$dni'\">Editar</button>");
        
        //printf("%s - %s\n", $row["dni"], $row["nombre"], $row["apellidos"], $row["correo"], $row["telf"]);
        echo "<br>";
        
    }
}
?>
<form action=<?php echo (isset($_GET['id']) ? "'../System/C_UpdatePost.php'" : "'../System/C_InsertPost.php'") ?> method="post">
		Id: <input type="number" name="id" readonly="readonly" value=<?php echo $id??''?>><br>
		<br> Titulo: <input type="text" name="title" value=<?php echo $title??''?>><br>
		<br> Resumen: <input type="text" name="brief" value=<?php echo $brief??''?>><br>
		<br> Contenido: <input type="text" name="content"  value=<?php echo $content??''?>><br>
		<br> Imagen: <input type="text" name="image" value=<?php echo $image??''?>><br>
		<br> Creado en: <input type="text" name="created_at" readonly="readonly" value=<?php echo $created_at??''?>><br>
		<br> Estado: <input type="number" name="status" value=<?php echo $status??''?>><br>
		<br> Id usuario: <input type="number" name="user_id" value=<?php echo $user_id??''?>><br>
		<br> <input type="submit" value="Enviar"> <input type="reset"
			name="reset" id="reset"> <a href="V_InsertPost.php" class="button">Volver</a>
	</form>

</body>
</html>