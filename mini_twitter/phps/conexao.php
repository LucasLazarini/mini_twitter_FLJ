<?php
  $conn = new mysqli("localhost", "user", "password", "mini-twitter");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
      echo "Deu ruim!";
    }
    echo "Deu certo!";
?>
