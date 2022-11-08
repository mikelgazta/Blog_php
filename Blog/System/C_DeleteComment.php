<?php
use Models\M_Comment;

require_once '../Models/Comment.php';
require_once '../Models/M_Comment.php';
session_start();
if (! isset($_SESSION['username'])) {
    header("Location: ../Views/V_loginform.php");
} else {
    $id = $_GET['id'];
    $con = new M_Comment();
    $con->deleteComment($id);
    $con->close();
    header("Location: ../Views/V_SelectComment.php");
}

?>