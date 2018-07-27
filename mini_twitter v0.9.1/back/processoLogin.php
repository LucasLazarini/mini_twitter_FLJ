<?php
  session_start();

  require_once('conexao.php');

  $username = $_POST['username'];
  $password = $_POST['senha'];
  $caixinha = $_POST['caixinha'];
  function hashPasswd( $passwd )
  {
  	return sha1( md5( $passwd ) );
  }
  $senha = hashPasswd($password);
  $query = "select username, name, password from users where username = '$username' ";
  if ($result = $conn->query($query)) {
    if ($row = $result->fetch_object()){
       if (strcmp($row->password, $senha)==0){
          $_SESSION['username'] = $row->username;
          $_SESSION['name'] = $row->name;
          $_SESSION['id'] = $row->id;
          if(isset($_POST['caixinha'])){
            $cookie_name = "username";
            $cookie_value = $row->username;
            setcookie($cookie_name, $cookie_value, time() + (259200 * 30), "/");
            $cookie_name2 = "password";
            $cookie_value2 = $row->password;
            setcookie($cookie_name2, $cookie_value2, time() + (259200 * 30), "/");
            header("Location: ../front/pageTimeLine.php?cookies=1");
          }else{
              header("Location: ../front/pageTimeLine.php?cookies=0");
          }
        } else {
          $_SESSION['error'] = "usuário ou senha incorretos";
          header("Location: ../front/login.php");
       }
      }
     } else {
       die ("erro no banco de dados");
     }
?>
