<?php
session_start();
require_once('conexao.php');

$novaCidade = $_POST['cidade'];
if(!empty($novaCidade)){
  $stmt = $conn->prepare("UPDATE users set city = (?) where id = (?)");
  $stmt->bind_param("ss", $novaCidade, $_SESSION['id']);
  if($stmt->execute()){
    $_SESSION['cidade'] = $novaCidade;
    header("Location: ../front/alterarDados.php");
  }else{
    echo "Erro!";
  }
}else{
  echo "vazio";
}
 ?>
