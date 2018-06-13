<?php
  require_once('conexao.php');

  $nome = $_POST["Nome"];
  $username = $_POST["Username"];
  $senha = $_POST["Senha"];
  $confirmacao = $_POST["Confirmacao"];
  $email = $_POST["Email"];
  $dtNasc = $_POST["dataNasc"];
  $genero = $_POST["genero"];
  $cidade = $_POST["cidade"];
  $website = $_POST["website"];

  $stmt = $conn->prepare("INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $nome, $username, $email, $senha);
  if($stmt->execute()){
    echo "Cadastro efetuado!";
  }else{
      header("Location: phps/registro.php");
  }

?>
