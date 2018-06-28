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

  $stmt = $conn->prepare("INSERT INTO users (name, username, email, password, birthDate, sex, city) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssssss", $nome, $username, $email, $senha, $dtNasc, $genero, $cidade);
  if($stmt->execute()){
      header("Location: login.php");
  }else{
      header("Location: registro.php");
  }

?>
