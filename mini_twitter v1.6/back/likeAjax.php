<?php
    require_once("conexao.php");
    session_start();

    if($_GET['id']){
      $twitt = $_GET['id'];
      $tipo = 0;
      $date = date('d/m/y');
      $idUser = $_SESSION['id'];
      $stmt = $conn->prepare("INSERT INTO likes (user_id, tweet_id, dateTime, type) VALUES (?, ?, ?, ?)");
      $stmt->bind_param("ssss", $idUser, $twitt, $date, $tipo);
      if($stmt->execute()){

        header("Location: ../front/pageTimeLine.php");
      }else{
        echo "Falha ao curtir";
      }
    }
 ?>
