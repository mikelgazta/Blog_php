<?php
session_start();
if (! isset($_SESSION['username'])) {
    header("Location: V_Loginform.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inicio</title>
</head>
<body>
	<h1>Plaiaundi Blog</h1>
	<h3>Bienvenido <?=$_SESSION['username']?></h3>
	<br>
	<br>
	<br>
	<button onclick="location.href='../System/C_Logout.php'">Logout</button>
</body>
</html>