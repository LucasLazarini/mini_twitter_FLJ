<?php
  session_start();

  require_once('conexao.php');
  $username = $_POST['username'];
  $password = $_POST['senha'];

  $query = "select username, name, password from users where username = '$username' ";
  if ($result = $conn->query($query)) {
    if ($row = $result->fetch_object()){
       if (strcmp($row->password, $password)==0){
          $_SESSION['username'] = $row->username;
          $_SESSION['name'] = $row->name;
          header("Location: ../front/pageTimeLine.php");
       } else {
         $_SESSION['error'] = "usuário ou senha incorretos";
         header("Location: ../front/login.php");
       }
     } else {
       die ("erro no banco de dados");
     }
   }
?>
