<?php
  session_start();
  require_once('conexao.php');

  $username = $_POST['username'];
  $password = $_POST['senha'];
  function hashPasswd( $passwd )
  {
  	return sha1( md5( $passwd ) );
  }
  $senha = hashPasswd($password);
  $query = "select id, username, name, password, picture, city, website from users where username = '$username' ";
  if ($result = $conn->query($query)) {
    if ($row = $result->fetch_object()){
       if (strcmp($row->password, $senha)==0){
          $_SESSION['username'] = $row->username;
          $_SESSION['name'] = $row->name;
          $_SESSION['id'] = $row->id;
          $_SESSION['foto'] = $row->picture;
          $_SESSION['cidade'] = $row->city;
          $_SESSION['website'] = $row->website;

          if(isset($_POST['caixinha'])){
            $cookie_name = "username";
            $cookie_value = $row->username;
            setcookie($cookie_name, $cookie_value, time() + (259200 * 30), "/");
            $cookie_name2 = "password";
            $cookie_value2 = $row->password;
            setcookie($cookie_name2, $cookie_value2, time() + (259200 * 30), "/");
            header("Location: ../front/pageTimeLine.php");
          }else{
              header("Location: ../front/pageTimeLine.php");
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
