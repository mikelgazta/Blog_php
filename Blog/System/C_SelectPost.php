<?php

namespace System;
use Models\M_Post;

session_start();
if (! isset($_SESSION['username'])) {
    header("Location: ../Views/V_Loginform.php");
}else{
    $username= $_SESSION['username'];
    
    $con = new M_Post();
    $con = $con->myPosts($username);
    $con->close();
    
    //     include_once 'V_SelectPost.php';
    
}