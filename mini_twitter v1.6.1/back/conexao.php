<?php
  $conn = new mysqli("localhost", "mini-twitter", "password", "mini-twitter");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
?>
