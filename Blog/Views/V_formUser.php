<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="formStyle.css">

<style>

.escondido{
    display: none;
}
</style>
<body>
<?php
session_start();
if (! isset($_SESSION['username'])) {
    header("Location: V_loginform.php");
}else{
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
}
?>
<form action=<?php echo (isset($_GET['id']) ? "../System/C_UpdateUser.php" : "../System/C_InsertUser.php") ?> method="post">
		<input type="text" class="escondido" name="id" readonly="readonly" value=<?php echo $id??''?>>
		<br> Nombre: <input type="text" name="name" value=<?php echo $name??''?>><br>
		<br> Apellidos: <input type="text" name="lastname" value=<?php echo $lastname??''?>><br>
		<br> Usuario: <input type="text" name="username"  value=<?php echo $username??''?>><br>
		<br> Correo: <input type="email" name="email" value=<?php echo $email??''?>><br>
		<br> Contraseña: <input type="password" name="password" value=<?php echo $password??''?>><br>
		<br> Imagen: <input type="text" name="image" value=<?php echo $image??''?>><br>
		<br> Estado: <input type="number" name="status" value=<?php echo $status??''?>><br>
		<br> Tipo: <input type="number" name="kind" value=<?php echo $kind??''?>><br>
		<input type="number" class="escondido" name="created_at" readonly="readonly" value=<?php echo $created_at??''?>><br>
		<br> <input type="submit" value="Enviar"> <input type="reset"
			name="reset" id="reset"> <a href="V_SelectUser.php" class="button">Volver</a>
	</form>

</body>
</html>
