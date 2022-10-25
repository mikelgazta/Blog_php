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
    $resultado = $mysqli->query("SELECT * FROM user");

    /* se recomienda el cierre explícito */
}
?>

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
	<h1>Todos los alumnos:</h1>
	<?php
	echo ("ID" . " - " . "Nombre" . " - " . "Apellido" . " - " . "Usuario" . " - " . "Correo" . " - " . "Contraseña" . " - " . "Imagen" . " - " . "Status" . " - " . "Tipo ".  " - "  . "Creado en");
	echo "<br><br>";
	
while ($row = $resultado->fetch_assoc()) {
    $id = $row['id'];
    echo ($row['id'] . " - " . $row['name'] . " - " . $row['lastname'] . " - " . $row['username'] . " - " . $row['email'] . " - " . $row['password'] . " - " . $row['image'] . " - " . $row['status'] . " - " . $row['kind'] . " - " . $row['created_at'] . " <button onclick=\"location.href='../System/C_DeleteUser.php?id=$id'\">Borrar</button> " . " <button onclick=\"location.href='V_formUser.php?dni=$id'\">Editar</button>");

    // printf("%s - %s\n", $row["dni"], $row["nombre"], $row["apellidos"], $row["correo"], $row["telf"]);
    echo "<br>";
}
$mysqli->close();
?>
	<br>
	<a href="V_formUser.php" class="button">Crear Usuario</a>
</body>
</html>

