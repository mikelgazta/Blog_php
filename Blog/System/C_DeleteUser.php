
<?php
use Models\M_User;

require_once '../Models/User.php';
require_once '../Models/M_user.php';
session_start();
if (! isset($_SESSION['username'])) {
    header("Location: ../Views/V_loginform.php");
} else {
    $id = $_GET['id'];
    $con = new M_User();
    $con->deleteUser($id);
    $con->close();
    header("Location: ../Views/V_SelectUser.php");
}

?>