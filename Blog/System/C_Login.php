<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: Loginform.php");
}

$user = $_GET['user'];
$pass = $_GET['pass'];

$mysqli = new mysqli("localhost", "root", "", "proyecto_blog");

if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!($sentencia = $mysqli->prepare("SELECT * FROM user where name= ? && password= ?"))) {
    echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (!$sentencia->bind_param("ss", $user, $pass)) {
    echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
}

if (!$sentencia->execute()) {
    echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
}
$resultado = $sentencia->get_result();

if($resultado->num_rows == 1){
    echo "user y pass correctos";
    session_start();
    $_SESSION['user']=$user;
    header("Location: select_test.php");
}else{
    header("Location: Loginform.php");
}