<?php
  require_once('conexao.php');
    if(isset($_COOKIE['username']) || isset($_COOKIE['password'])){
      $username = $_COOKIE['username'];
      $password = $_COOKIE['password'];
      $query = "select username, name, password from users where username = '$username' ";
      if ($result = $conn->query($query)) {
        if ($row = $result->fetch_object()){
           if (strcmp($row->password, $password)==0){
              $_SESSION['username'] = $row->username;
              $_SESSION['name'] = $row->name;
              header("Location: ../front/pageTimeLine.php?cookies=1");
            }
        }
      }
    }
 ?>
