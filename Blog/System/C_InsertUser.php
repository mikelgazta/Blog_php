<?php

use Models\M_user;
use Models\User;
require_once 'Models/Usuario.php';
require_once 'Models/M_Usuario.php';

$id = $_POST['id'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$image = $_POST['image'];
$status = $_POST['status'];
$kind = $_POST['kind'];
$created_at = $_POST['created_at'];

$con = new M_user();

$user = new User($id, $name, $lastname, $username, $email, $password, $image, $status, $kind, $created_at);

$con->insertUsuario($user);
$con->close();

header("Location: C_verUsuarios.php");
exit();
?>