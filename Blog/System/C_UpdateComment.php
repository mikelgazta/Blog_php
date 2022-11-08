<?php

use Models\M_Comment;
use Models\Comment;
require_once '../Models/Comment.php';
require_once '../Models/M_Comment.php';

$id = $_POST['id'];
$name = $_POST['name'];
$comment = $_POST['comment'];
$email = $_POST['email'];
$post_id = $_POST['post_id'];
$created_at = $_POST['created_at'];
$status = $_POST['status'];



$con = new M_Comment();

$comentario = new Comment($id, $name, $comment, $email, $post_id, $created_at, $status);

$con->updateComment($comentario);
$con->close();

header("Location: ../Views/V_SelectComment.php");
exit();
?>
