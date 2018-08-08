<?php
  if (!empty($_POST['Nome'])) {
    require_once('conexao.php');
    session_start();

    $nome = $_POST["Nome"];
    $username = $_POST["Username"];
    $senha = $_POST["Senha"];
    $email = $_POST["Email"];
    $dtNasc = $_POST["dataNasc"];
    $genero = $_POST["genero"];
    $cidade = $_POST["cidade"];
    $website = $_POST["website"];
    function hashPasswd( $passwd )
    {
      return sha1( md5( $passwd ) );
    }

    $senha = hashPasswd($senha);

    $stmt = $conn->prepare("INSERT INTO users (name, username, email, password, birthDate, sex, city, website) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $nome, $username, $email, $senha, $dtNasc, $genero, $cidade, $website);
    if($stmt->execute()){
      $query = "select id, username, name, password from users where username = '$username' ";
      if ($result = $conn->query($query)) {
        if ($row = $result->fetch_object()){
          if (strcmp($row->password, $senha)==0){
            $_SESSION['username'] = $row->username;
            $_SESSION['name'] = $row->name;
            $_SESSION['id'] = $row->id;

            echo "ok";
            header("Location: ../front/login.php");
          }
        }
      }else{
        header("Location: ../front/registro.php");
      }
    }
  }else{
    header("Location: ../front/registro.php");
  }
  // require_once('conexao.php');
  // session_start();
  //
  // $nome = $_POST["Nome"];
  // $username = $_POST["Username"];
  // $senha = $_POST["Senha"];
  // $email = $_POST["Email"];
  // $dtNasc = $_POST["dataNasc"];
  // $genero = $_POST["genero"];
  // $cidade = $_POST["cidade"];
  // $website = $_POST["website"];
  // function hashPasswd( $passwd )
  // {
  //   return sha1( md5( $passwd ) );
  // }
  //
  // $senha = hashPasswd($senha);
  //
  // $stmt = $conn->prepare("INSERT INTO users (name, username, email, password, birthDate, sex, city, website) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
  // $stmt->bind_param("ssssssss", $nome, $username, $email, $senha, $dtNasc, $genero, $cidade, $website);
  // if($stmt->execute()){
  //   $query = "select id, username, name, password from users where username = '$username' ";
  //   if ($result = $conn->query($query)) {
  //     if ($row = $result->fetch_object()){
  //       if (strcmp($row->password, $senha)==0){
  //         $_SESSION['username'] = $row->username;
  //         $_SESSION['name'] = $row->name;
  //         $_SESSION['id'] = $row->id;
  //
  //         echo "ok";
  //         header("Location: ../front/login.php");
  //       }
  //     }
  //   }else{
  //     header("Location: ../front/registro.php");
  //   }
  // }
?>
