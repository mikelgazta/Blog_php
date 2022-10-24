<?php
session_start();
session_unset();
session_destroy();
header("Location: ../Views/V_Loginform.php");
?>