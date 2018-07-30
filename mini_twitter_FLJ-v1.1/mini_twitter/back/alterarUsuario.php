<?php
  session_start();
  require_once('conexao.php');

  $novoUsername = $_POST['Username'];
  if(!empty($novoUsername)){
    $stmt = $conn->prepare("UPDATE users set username = (?) where id = (?)");
    $stmt->bind_param("ss", $novoUsername, $_SESSION['id']);
    if($stmt->execute()){
      header("Location: ../front/alterarDados.php");
    }else{
        header("Location: ../front/alterarDados.php");
    }
  }else{
    header("Location: ../front/alterarDados.php");
  }

?>
