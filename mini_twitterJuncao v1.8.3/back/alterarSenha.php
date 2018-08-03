<?php
  session_start();
  require_once('conexao.php');

  $novaSenha = $_POST['Senha'];
  $confNovaSenha = $_POST['Confirmacao'];

  if(!empty($novaSenha)){
    if($novaSenha == $confNovaSenha){
      $stmt = $conn->prepare("UPDATE users set password = (?) where id = (?)");
      $stmt->bind_param("ss", $novaSenha, $_SESSION['id']);
      if($stmt->execute()){
        header("Location: ../front/alterarDados.php");
      }else{
          echo "Erro!";
      }
    }else{
      echo "Senhas não batem!";
    }
  }else{
    echo "A senha não estar em branco!";
  }

?>
