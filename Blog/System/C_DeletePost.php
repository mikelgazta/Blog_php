<?php
use Models\M_Post;

require_once '../Models/Post.php';
require_once '../Models/M_Post.php';
session_start();
if (! isset($_SESSION['username'])) {
    header("Location: ../Views/V_loginform.php");
} else {
    $id = $_GET['id'];
    $con = new M_Post();
    $con->deletePost($id);
    $con->close();
    header("Location: ../Views/V_SelectPost.php");
}

?>