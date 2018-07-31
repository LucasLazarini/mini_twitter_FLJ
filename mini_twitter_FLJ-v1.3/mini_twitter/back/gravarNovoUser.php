<?php
  require_once('conexao.php');

  $nome = $_POST["Nome"];
  $username = $_POST["Username"];
  $senha = $_POST["Senha"];
  $email = $_POST["Email"];
  $dtNasc = $_POST["dataNasc"];
  $genero = $_POST["genero"];
  $cidade = $_POST["cidade"];
  $website = $_POST["website"];

  $stmt = $conn->prepare("INSERT INTO users (name, username, email, password, birthDate, sex, city, website) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssssss", $nome, $username, $email, $senha, $dtNasc, $genero, $cidade, $website);
  if($stmt->execute()){
    $query = "select id, username, name, password from users where username = '$username' ";
    if ($result = $conn->query($query)) {
      if ($row = $result->fetch_object()){
        if (strcmp($row->password, $password)==0){
          $_SESSION['username'] = $row->username;
          $_SESSION['name'] = $row->name;
          $_SESSION['id'] = $row->id;
          header("Location: ../front/pageTimeLine.php");
        }
      }
    }else{
      header("Location: ../front/registro.php");
    }
  }
?>
