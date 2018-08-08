<?php
session_start();
require_once('conexao.php');

$novoWebsite = $_POST['website'];
if(!empty($novoWebsite)){
  $stmt = $conn->prepare("UPDATE users set website = (?) where id = (?)");
  $stmt->bind_param("ss", $novoWebsite, $_SESSION['id']);
  if($stmt->execute()){
    $_SESSION['website'] = $novoWebsite;
    header("Location: ../front/alterarDados.php");
  }else{
    echo "Erro!";
  }
}else{
  echo "vazio";
}
?>
