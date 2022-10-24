<?php

use Models\M_Comment;
use Models\Comment;
require_once 'Models/Usuario.php';
require_once 'Models/M_Usuario.php';

$id = $_POST['id'];
$name = $_POST['name'];
$comment = $_POST['comment'];
$email = $_POST['email'];
$post_id = $_POST['post_id'];
$created_at = $_POST['created_at'];
$status = $_POST['status'];



$con = new M_Comment();

$comment = new Comment($id, $name, $comment, $email, $post_id, $created_at, $status, );

$con->insertUsuario($comment);
$con->close();

header("Location: C_verUsuarios.php");
exit();
?>