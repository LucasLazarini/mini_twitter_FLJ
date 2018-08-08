<?php
    setcookie("username", "", time() - (259200 * 30), "/");
    setcookie("password", "", time() - (259200 * 30), "/");
    if(isset($_SESSION['username'])){
      session_destroy();
    }
    if(isset($_SESSION['foto'])){
      session_destroy();
    }
    header("Location: ../front/login.php");
 ?>
