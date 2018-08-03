<?php
  require_once("conexao.php");
  session_start();

  if($_GET['id']){
    $twitt = $_GET['id'];
    $query2 = "update tweets SET removed = 1 where id = $twitt";
    $result2 = $conn->query($query2) or die($conn->error);
    if($result2){
      #echo "Removido";
      header("Location: ../front/pageTimeLine.php");
    }else{
      echo "Falha ao remover";
    }

  }
?>
