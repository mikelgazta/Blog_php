<?php
use Models\Post;
use Models\M_Post;
require_once 'Models/Post.php';
require_once 'Models/M_Post.php';

$id = $_POST['id'];
$title = $_POST['title'];
$brief = $_POST['brief'];
$content = $_POST['content'];
$image = $_POST['image'];
$created_at = $_POST['created_at'];
$status = $_POST['status'];
$user_id = $_POST['user_id'];



$con = new M_Post();

$post = new Post( $id, $title, $brief, $content, $image, $created_at, $status, $user_id);

$con->insertUsuario($post);
$con->close();

header("Location: C_verUsuarios.php");
exit();
?>