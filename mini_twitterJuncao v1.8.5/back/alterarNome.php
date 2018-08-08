<?php
  session_start();
  require_once('conexao.php');

  $novoNome = $_POST['Nome'];
  if(!empty($novoNome)){
    $stmt = $conn->prepare("UPDATE users set name = (?) where id = (?)");
    $stmt->bind_param("ss", $novoNome, $_SESSION['id']);
    if($stmt->execute()){
      header("Location: ../front/alterarDados.php");
    }else{
      echo "Erro!";
    }
  }else{
    echo "vazio";
  }
?>
