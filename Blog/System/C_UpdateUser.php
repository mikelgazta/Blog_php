<?php
namespace System;

use Models\M_User;
use Models\User;

session_start();
if (! isset($_SESSION['username'])) {
    header("Location: ../Views/V_Loginform.php");
}else{
   
require_once '../Models/User.php';
require_once '../Models/M_user.php';

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

$con = new M_User();

$user = new User($id, $name, $lastname, $username, $email, $password, $image, $status, $kind, $created_at);

$con->updateUser($user);
$con->close();

header("Location: ../Views/V_SelectUser.php");
exit();
}
?>
