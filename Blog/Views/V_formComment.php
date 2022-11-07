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

    $entrada = $mysqli->query("SELECT * FROM user WHERE id='$id'");
    
    while ($row = $entrada->fetch_assoc()) {
        $id=$row['id'];
        $name = $row['name'];
        $comment = $row['comment'];
        $email = $row['email'];
        $post_id = $row['post_id'];
        $created_at = $row['created_at'];
        $status = $row['status'];
        //echo($row['dni'] . " - " . $row['title'] . " - " . $row['brief'] . " - " . $row['content'] . " - " . $row['image']. " - " . $row['created_at']. " <button onclick=\"location.href='delete_test.php?dni=$dni'\">Borrar</button> ". " <button onclick=\"location.href='formulario.php?dni=$dni'\">Editar</button>");
        
        //printf("%s - %s\n", $row["dni"], $row["nombre"], $row["apellidos"], $row["correo"], $row["telf"]);
        echo "<br>";
        
    }
}
?>
<form action=
<?php echo (isset($_GET['id']) ? "'update_test.php'" : "'../System/C_InsertComment.php'")?> 
method="post">
		ID: <input type="number" name="id" readonly="readonly" value=<?php echo $id??''?>><br>
		<br> Name: <input type="text" name="name" value=<?php echo $name??''?>><br>
		<br> Comment: <input type="text" name="comment" value=<?php echo $comment??''?>><br>
		<br> Email: <input type="text" name="email"  value=<?php echo $email??''?>><br>
		<br> Post_id: <input type="text" name="post_id" value=<?php echo $post_id??''?>><br>
		<br> Created at: <input type="text" name="created_at" readonly="readonly" value=<?php echo $created_at??''?>><br>
		<br> Status: <input type="text" name="status" value=<?php echo $status??''?>><br>
		<br> <input type="submit" value="Enviar"> 
		<input type="reset" name="reset" id="reset"> 
		<a href="V_InsertComment.php" class="button">Volver</a>
	</form>

</body>
</html>