<?php
  $conn = new mysqli("localhost", "user_twitter", "password", "mini-twitter");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

?>
