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

    $user = $mysqli->query("SELECT * FROM user WHERE id='$id'");
    
    while ($row = $user->fetch_assoc()) {
        $id=$row['id'];
        $name = $row['name'];
        $lastname = $row['lastname'];
        $username = $row['username'];
        $email = $row['email'];
        $password = $row['password'];
        $image = $row['image'];
        $status = $row['status'];
        $kind = $row['kind'];
        $created_at = $row['created_at'];
        //echo($row['dni'] . " - " . $row['nombre'] . " - " . $row['apellidos'] . " - " . $row['correo'] . " - " . $row['telf']. " - " . $row['profesor']. " <button onclick=\"location.href='delete_test.php?dni=$dni'\">Borrar</button> ". " <button onclick=\"location.href='formulario.php?dni=$dni'\">Editar</button>");
        
        //printf("%s - %s\n", $row["dni"], $row["nombre"], $row["apellidos"], $row["correo"], $row["telf"]);
        echo "<br>";
        
    }
}
?>
<form action=<?php echo (isset($_GET['id']) ? "update_test.php" : "../System/C_InsertUser.php") ?> method="post">
		Id: <input type="number" name="id" readonly="readonly" value=<?php echo $id??''?>><br>
		<br> Nombre: <input type="text" name="name" value=<?php echo $name??''?>><br>
		<br> Apellidos: <input type="text" name="lastname" value=<?php echo $lastname??''?>><br>
		<br> Usuario: <input type="text" name="username"  value=<?php echo $username??''?>><br>
		<br> Correo: <input type="email" name="email" value=<?php echo $email??''?>><br>
		<br> Contraseña: <input type="password" name="password" value=<?php echo $password??''?>><br>
		<br> Imagen: <input type="text" name="image" value=<?php echo $image??''?>><br>
		<br> Estado: <input type="number" name="status" value=<?php echo $status??''?>><br>
		<br> Tipo: <input type="number" name="kind" value=<?php echo $kind??''?>><br>
		<br> Creado en: <input type="text" name="created_at" readonly="readonly" value=<?php echo $created_at??''?>><br>
		<br> <input type="submit" value="Enviar"> <input type="reset"
			name="reset" id="reset"> <a href="V_InsertUser.php" class="button">Volver</a>
	</form>

</body>
</html>
